<?php

namespace Nckrtl\DeBanensite\DTO;

use Illuminate\Support\Collection;
use Saloon\Http\Response;

class CompanyBranches
{
    public static function fromResponse(Response $response): Collection
    {
        $data = $response->json();

        return collect($data['hydra:member'])->map(function ($branch) {
            return str_replace('/company_branches/', '', $branch['@id']);
        });
    }
}
