<?php

namespace Nckrtl\DeBanensite\ApiRequests\EmploymentType;

use Saloon\Enums\Method;
use Saloon\Http\Request;

// Description: Retrieves the collection of CompanyBranch resources.

class EmploymentTypes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/employment_types';
    }
}
