<?php

namespace NckRtl\DeBanensite\ApiRequests\CompanyBranch;

use NckRtl\DeBanensite\DTO\CompanyBranches;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

// Description: Retrieves the collection of CompanyBranch resources.

class GetCompanyBranches extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/company_branches';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return CompanyBranches::fromResponse($response);
    }
}
