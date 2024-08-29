<?php

namespace NckRtl\DeBanensite\ApiRequests\CompanyBranch;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\HasTimeout;

// Description: Retrieves the collection of CompanyBranch resources.

class GetCompanyBranch extends Request
{
    use HasTimeout;

    protected int $connectTimeout = 60;

    protected int $requestTimeout = 600;

    protected Method $method = Method::GET;

    public function __construct(
        protected string $id,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/company_branches/'.$this->id;
    }
}
