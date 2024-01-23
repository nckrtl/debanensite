<?php

namespace NckRtl\DeBanensite\ApiRequests;

use NckRtl\DeBanensite\DTO\Address;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCompanyBranchAddress extends Request
{
    protected Method $method = Method::GET;

    protected string $branchId;

    public function __construct(string $branchId)
    {
        $this->branchId = $branchId;
    }

    public function resolveEndpoint(): string
    {
        return '/company_branches/'.$this->branchId.'/address';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Address::fromResponse($response);
    }
}
