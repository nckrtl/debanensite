<?php

namespace Nckrtl\DeBanensite\DTO;

use Saloon\Http\Response;

class EducationLevels
{
    public static function fromResponse(Response $response): array
    {
        $data = $response->json();

        return collect($data['hydra:member'])->map(function ($educationLevel) {
            return [
                'id' => str_replace('/education_levels/', '', $educationLevel['@id']),
                'name' => $educationLevel['name'],
                'slug' => $educationLevel['slug'],
            ];
        })->toArray();
    }
}
