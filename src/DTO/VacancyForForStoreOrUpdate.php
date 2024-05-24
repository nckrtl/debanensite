<?php

namespace NckRtl\DeBanensite\DTO;

class VacancyForForStoreOrUpdate
{
    public function __construct(
        public string $title,
        public string $description,
        public string $companyBranch,
        public ?string $slug = null,
        public ?string $category = null,
        public ?string $employmentType = null,
        public ?string $educationLevel = null,
        public ?array $requiredFieldsForApplication = null,
        public ?int $minHours = null,
        public ?int $maxHours = null,
        public ?string $publishFrom = null,
        public ?string $fulfilledAt = null,
        public mixed $contactPerson = null,
        public ?int $salaryMin = null,
        public ?int $salaryMax = null,
        public ?string $youtubeId = null,
        public ?string $zipcode = null,
        public ?string $street = null,
        public ?int $houseNumber = null,
        public ?string $houseNumberSuffix = null,
        public ?string $city = null,
        public ?string $country = null,
        public mixed $backgroundImage = null,
        public mixed $logo = null,
    ) {
    }
}
