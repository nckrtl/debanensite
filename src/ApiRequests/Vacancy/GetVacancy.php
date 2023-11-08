<?php

namespace Nckrtl\DeBanensite\ApiRequests\Vacancy;

use Nckrtl\DeBanensite\DTO\Vacancy;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetVacancy extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $id,
        protected ?string $dtoType = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/vacancies/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Vacancy::fromResponse($response, $this->dtoType);
    }
}
