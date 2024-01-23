<?php

namespace NckRtl\DeBanensite\ApiRequests;

use NckRtl\DeBanensite\DTO\Address;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetAddress extends Request
{
    protected Method $method = Method::GET;

    protected string $id;

    public function __construct(string $addressId)
    {
        $this->id = $addressId;
    }

    public function resolveEndpoint(): string
    {
        return '/addresses/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Address::fromResponse($response);
    }
}
