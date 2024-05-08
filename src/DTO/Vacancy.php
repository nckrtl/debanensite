<?php

namespace NckRtl\DeBanensite\DTO;

use Saloon\Http\Response;

final class Vacancy
{
    public function __construct(
        public ?string $id,
        public string $title,
        public string $slug,
        public ?string $description,
        public Address $address,
        public ?array $category,
        public ?array $employmentType,
        public ?array $educationLevel,
        public ?array $contractDuration,
        public ?array $compensationType,
        public ?string $contactPerson,
        public ?float $salaryMin,
        public ?float $salaryMax,
        public ?int $minHours,
        public ?int $maxHours,
        public string $publishFrom,
        public ?string $publishTo,
        public bool $online,
        public ?string $contactEmail,
        public ?string $applyUrl,
        public array $companyBranch,
        public ?array $requiredFieldsForApplication,
        public mixed $backgroundImage,
        public ?string $logo,
        public ?array $usps,
        public ?array $screeningQuestions,
        public ?string $uwvJob,
        public ?string $metaTitle,
        public ?string $metaDescription,
        public ?string $publishedAt,
        public ?string $fulfilledAt,
        public ?int $publishedAtRefreshCount,
        public ?string $youtubeId,
        public bool $published,
    ) {
    }

    public static function fromResponse(Response $response, ?string $dtoType = null): self|VacancyForForStoreOrUpdate
    {
        $data = $response->json();

        return match ($dtoType) {
            'updateOrCreate' => self::updateFormat($data),
            default => self::defaultFormat($data),
        };
    }

    public static function defaultFormat($data): self
    {
        $id = str_replace('/vacancies/', '', $data['@id']);

        return new self(
            $id,
            $data['title'],
            $data['slug'],
            $data['description'] ?? null,
            Address::fromJson($data['address']),
            $data['category'] ?? null,
            $data['employmentType'] ?? null,
            $data['educationLevel'] ?? null,
            $data['contractDuration'] ?? null,
            $data['compensationType'] ?? null,
            $data['contactPerson'] ?? null,
            $data['salaryMin'] ?? null,
            $data['salaryMax'] ?? null,
            $data['minHours'] ?? null,
            $data['maxHours'] ?? null,
            $data['publishFrom'],
            $data['publishTo'],
            $data['online'],
            $data['contactEmail'] ?? null,
            $data['applyUrl'] ?? null,
            $data['companyBranch'],
            $data['requiredFieldsForApplication'] ?? null,
            $data['backgroundImage'] ?? null,
            $data['logo'] ?? null,
            $data['usps'] ?? null,
            $data['screeningQuestions'] ?? null,
            $data['uwvJob'] ?? null,
            $data['metaTitle'] ?? null,
            $data['metaDescription'] ?? null,
            $data['publishedAt'] ?? null,
            $data['fulfilledAt'] ?? null,
            $data['publishedAtRefreshCount'] ?? null,
            $data['youtubeId'],
            $data['published']
        );
    }

    public static function updateFormat($data): VacancyForForStoreOrUpdate
    {
        return new VacancyForForStoreOrUpdate(
            title: trim($data['title']),
            slug: trim($data['slug']),
            description: $data['description'],
            companyBranch: $data['companyBranch']['@id'],
            category: $data['category']['@id'],
            employmentType: $data['employmentType']['@id'],
            educationLevel: $data['educationLevel']['@id'],
            requiredFieldsForApplication: $data['requiredFieldsForApplication'],
            minHours: $data['minHours'],
            maxHours: $data['maxHours'],
            salaryMin: $data['salaryMin'],
            salaryMax: $data['salaryMax'],
            publishFrom: $data['publishFrom'],
            fulfilledAt: $data['fulfilledAt'],
            contactPerson: is_array($data['contactPerson']) ? $data['contactPerson']['@id'] : $data['contactPerson'],
            youtubeId: $data['youtubeId'],
            zipcode: $data['address']['zipcode'],
            houseNumber: $data['address']['houseNumber'],
            houseNumberSuffix: $data['address']['houseNumberSuffix'],
            street: $data['address']['street'],
            city: $data['address']['city'],
            country: $data['address']['country'],
            backgroundImage: $data['backgroundImage'] ?? null,
            logo: $data['logo'] ?? null,
        );
    }
}
