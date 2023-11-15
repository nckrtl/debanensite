<?php

namespace Nckrtl\DeBanensite\ApiRequests\Vacancy;

use Nckrtl\DeBanensite\DTO\Vacancies;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetVacancies extends Request
{
    protected Method $method = Method::GET;

    protected int $page;

    public function __construct(int $page = 1)
    {
        $this->page = $page;
    }

    public function resolveEndpoint(): string
    {
        return '/vacancies';
    }

    protected function defaultQuery(): array
    {
        return [
            'published' => true,
            'page' => $this->page,
        ];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Vacancies::fromResponse($response);
    }
}
