<?php

namespace NckRtl\DeBanensite\ApiRequests\Vacancy;

use NckRtl\DeBanensite\DTO\VacancyForForStoreOrUpdate;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateVacancy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/vacancies/'.$this->id;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/ld+json',
        ];
    }

    public function __construct(
        protected string $id,
        readonly protected VacancyForForStoreOrUpdate $vacancy
    ) {}

    protected function defaultBody(): array
    {
        $body = array_filter((array) $this->vacancy);
        $body['variables'] = [
            'id' => '/vacancies/'.$this->id,
        ];

        return $body;
    }
}
