<?php

namespace NckRtl\DeBanensite;

use Illuminate\Support\Collection;
use NckRtl\DeBanensite\ApiRequests\CompanyBranch\GetCompanyBranch;
use NckRtl\DeBanensite\ApiRequests\CompanyBranch\GetCompanyBranches;
use NckRtl\DeBanensite\ApiRequests\GetAddress;
use NckRtl\DeBanensite\ApiRequests\Vacancy\DeleteVacancy;
use NckRtl\DeBanensite\ApiRequests\Vacancy\GetVacancies;
use NckRtl\DeBanensite\ApiRequests\Vacancy\GetVacancy;
use NckRtl\DeBanensite\ApiRequests\Vacancy\StoreVacancy;
use NckRtl\DeBanensite\ApiRequests\Vacancy\UpdateVacancy;
use NckRtl\DeBanensite\DTO\VacancyForForStoreOrUpdate;

class DeBanensite
{
    public function __construct(protected DeBanensiteConnector $connector)
    {
    }

    public function allPublishedVacancyIds(): Collection
    {
        $currentPage = 1;

        $vacancies = $this->connector->send(new GetVacancies())->dto();

        $allOnlineVacancies = $vacancies['items']->map(function ($vacancy) {
            return $vacancy->id;
        });

        $lastPage = (int) ceil($vacancies['total'] / count($vacancies['items']));

        if ($lastPage > $currentPage) {

            for ($i = ($currentPage + 1); $i <= $lastPage; $i++) {

                $vacancies = $this->connector->send(new GetVacancies($i))->dto();
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
        $vacancy = $this->connector->send(new GetVacancy($vacancyId, 'updateOrCreate'))->dto();

        $vacancy->fulfilledAt = now()->setTimezone('UTC')->format('Y-m-d\TH:i:sP');
        $vacancy->houseNumber = $vacancy->houseNumber ?? 1;
        $vacancy->zipcode = $vacancy->zipcode ?? '1234 AB';

        $this->connector->send(new UpdateVacancy($vacancyId, $vacancy));
    }

    public function getVacancy(string $vacancyId, ?string $dtoType = null)
    {
        return $this->connector->send(new GetVacancy($vacancyId, $dtoType))->dto();
    }

    public function deleteVacancy(string $vacancyId, ?string $dtoType = null)
    {
        return $this->connector->send(new DeleteVacancy($vacancyId, $dtoType))->dto();
    }

    public function updateVacancy(string $vacancyId, VacancyForForStoreOrUpdate $vacancyDto)
    {
        return $this->connector->send(new UpdateVacancy($vacancyId, $vacancyDto))->dto();
    }

    public function storeVacancy(VacancyForForStoreOrUpdate $vacancyDto)
    {
        return $this->connector->send(new StoreVacancy($vacancyDto))->json();
    }

    public function getLocation(string $locationId)
    {
        return $this->connector->send(new GetCompanyBranch($locationId))->dto();
    }

    public function getLocations()
    {
        return $this->connector->send(new GetCompanyBranches())->dto();
    }

    public function getCompanyBranch(string $branchId, ?string $dtoType = null)
    {
        return $this->connector->send(new GetCompanyBranch($branchId))->json();
    }

    public function getCompanyBranches()
    {
        return $this->connector->send(new GetCompanyBranches())->json();
    }

    public function getAddress(string $addressId, ?string $dtoType = null)
    {
        return $this->connector->send(new GetAddress($addressId))->json();
    }
}
