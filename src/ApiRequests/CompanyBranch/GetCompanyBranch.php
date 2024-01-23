<?php

namespace NckRtl\DeBanensite\ApiRequests\CompanyBranch;

use Saloon\Enums\Method;
use Saloon\Http\Request;

// Description: Retrieves the collection of CompanyBranch resources.

class GetCompanyBranch extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/company_branches/'.$this->id;
    }
}
