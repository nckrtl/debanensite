<?php

namespace NckRtl\DeBanensite\ApiRequests\EducationLevel;

use Saloon\Enums\Method;
use Saloon\Http\Request;

// Description: Retrieves the collection of CompanyBranch resources.

class EducationLevels extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/education_levels';
    }
}
