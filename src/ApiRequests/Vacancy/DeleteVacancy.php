<?php

namespace NckRtl\DeBanensite\ApiRequests\Vacancy;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class DeleteVacancy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    protected string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function resolveEndpoint(): string
    {
        return '/vacancies/'.$this->id;
    }
}
