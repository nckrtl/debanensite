<?php

namespace Nckrtl\DeBanensite;

use Illuminate\Support\Collection;
use Nckrtl\DeBanensite\ApiRequests\Vacancy\GetVacancies;

class DeBanensite
{
    public function allOnlineVacancyIds(): Collection
    {
        $api = new DeBanensiteConnector(config('auth.debanensite_app_api_key'));
        $currentPage = 1;

        $vacancies = $api->send(new GetVacancies())->dto();

        $allOnlineVacancies = $vacancies['items']->map(function ($vacancy) {
            return $vacancy->id;
        });

        $lastPage = $vacancies['pages']['last'];

        if ($lastPage > $currentPage) {
            // ray('found '.$lastPage.' pages of vacancies');

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
}
