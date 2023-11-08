<?php

namespace Nckrtl\DeBanensite\DTO;

use Illuminate\Support\Collection;
use Saloon\Http\Response;

class Vacancies
{
    public static function fromResponse(Response $response): Collection
    {
        $data = $response->json();

        ray($data);

        return collect([
            'total' => $data['hydra:totalItems'],
            'pages' => [
                'next' => array_key_exists('hydra:next', $data['hydra:view']) ? (int) str_replace('/vacancies?online=1&page=', '', $data['hydra:view']['hydra:next']) : null,
                'last' => (int) str_replace('/vacancies?online=1&page=', '', $data['hydra:view']['hydra:last']),
            ],
            'items' => collect($data['hydra:member'])->map(function ($vacancy) {
                return Vacancy::defaultFormat($vacancy);
            }),
        ]);
    }
}
