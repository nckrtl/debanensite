<?php

namespace Nckrtl\DeBanensite\ApiRequests;

use Nckrtl\DeBanensite\Dto\EducationLevels;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetEducationLevels extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/education_levels';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return EducationLevels::fromResponse($response);
    }
}
