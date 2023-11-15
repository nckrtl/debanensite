<?php

namespace Nckrtl\DeBanensite;

use Illuminate\Support\Collection;
use Nckrtl\DeBanensite\ApiRequests\Vacancy\GetVacancies;
use Nckrtl\DeBanensite\ApiRequests\Vacancy\GetVacancy;
use Nckrtl\DeBanensite\ApiRequests\Vacancy\UpdateVacancy;

class DeBanensite
{
    public function allOnlineVacancyIds(): Collection
    {
        $api = new DeBanensiteConnector(config('auth.debanensite_api_key'));
        $currentPage = 1;

        $vacancies = $api->send(new GetVacancies())->dto();

        $allOnlineVacancies = $vacancies['items']->map(function ($vacancy) {
            return $vacancy->id;
        });

        $lastPage = $vacancies['pages']['last'];

        if ($lastPage > $currentPage) {

            for ($i = ($currentPage + 1); $i <= $lastPage; $i++) {

                $vacancies = $api->send(new GetVacancies($i))->dto();
                $vacancies = $vacancies['items']->map(function ($vacancy) {
                    return $vacancy->id;
                });
                $allOnlineVacancies = $allOnlineVacancies->merge($vacancies);
            }
        }

        return $allOnlineVacancies;
    }

    public function closeVacancy($vacancyId)
    {
        $api = new DeBanensiteConnector(config('auth.debanensite_api_key'));

        $vacancy = $api->send(new GetVacancy($vacancyId))->dto('updateOrCreate');

        $vacancy->fulfilledAt = now()->format('Y-m-d\TH:i:s.v\Z');

        $api->send(new UpdateVacancy($vacancyId, $vacancy));
    }

    public function getVacancy(string $vacancyId, string $dtoType = null)
    {
        $api = new DeBanensiteConnector(config('auth.debanensite_api_key'));

        $vacancy = $api->send(new GetVacancy($vacancyId, $dtoType))->dto();

        return $vacancy;
    }
}
