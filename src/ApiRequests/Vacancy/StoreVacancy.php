<?php

namespace NckRtl\DeBanensite\ApiRequests\Vacancy;

use NckRtl\DeBanensite\DTO\Vacancy;
use NckRtl\DeBanensite\DTO\VacancyForForStoreOrUpdate;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class StoreVacancy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/vacancies';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/ld+json',
        ];
    }

    public function __construct(
        readonly protected VacancyForForStoreOrUpdate $vacancy
    ) {}

    protected function defaultBody(): array
    {
        return array_filter((array) $this->vacancy);
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Vacancy::fromResponse($response);
    }
}
