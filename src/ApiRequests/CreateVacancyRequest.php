<?php

namespace Nckrtl\DeBanensite\ApiRequests;

use Illuminate\Support\Str;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateVacancyRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $title,
        protected string $description,
        protected string $companyBranch,
        protected string $category, //Detailhandel,
        protected string $employmentType,
        protected string $educationLevel,
        protected string $salaryMin,
        protected string $salaryMax,
        protected string $publishFrom, // format: "2023-08-23T20:34:29.867Z",
        protected string $publishTo, // "2023-08-23T20:34:29.867Z",
        protected array $requiredFieldsForApplication,
        protected string $minHours,
        protected string $maxHours,
        protected string $youtubeId,
        // protected string $zipcode,
        // protected string $houseNumber,
        // protected string $houseNumberSuffix,
        // protected string $latitude,
        // protected string $longitude,
        // protected string $street,
        // protected string $city,
        // protected string $state,
        // protected string $country = 'Nederland',
    ) {
    }

    protected function defaultBody(): array
    {
        return [
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'companyBranch' => $this->companyBranch,
            'description' => $this->description,
            'category' => $this->category,
            'employmentType' => $this->employmentType,
            'educationLevel' => $this->educationLevel,
            'salaryMin' => $this->salaryMin,
            'salaryMax' => $this->salaryMax,
            'publishFrom' => $this->publishFrom,
            'publishTo' => $this->publishTo,
            'requiredFieldsForApplication' => $this->requiredFieldsForApplication,
            'minHours' => $this->minHours,
            'maxHours' => $this->maxHours,
            'youtubeId' => $this->youtubeId,
            // 'zipcode' => $this->zipcode,
            // 'houseNumber' => $this->houseNumber,
            // 'latitude' => $this->latitude,
            // 'longitude' => $this->longitude,
            // 'street' => $this->street,
            // 'city' => $this->city,
            // 'state' => $this->state,
            // 'country' => $this->country,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/vacancies';
    }
}
