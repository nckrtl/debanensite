<?php

namespace NckRtl\DeBanensite\DTO;

use Saloon\Http\Response;

final class Address
{
    public function __construct(
        public string $id,
        public ?string $zip,
        public ?string $houseNumber,
        public ?string $houseNumberSuffix,
        public ?float $latitude,
        public ?float $longitude,
        public ?string $street,
        public ?string $city,
        public ?string $state,
        public ?string $country,
        public ?string $formattedAddress,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        return self::fromJson($data);
    }

    public static function fromJson($data): self
    {
        $id = str_replace('/addresses/', '', $data['@id']);

        return new self(
            $id,
            $data['zipcode'] ?? null,
            $data['houseNumber'] ?? null,
            $data['houseNumberSuffix'] ?? null,
            $data['latitude'] ?? null,
            $data['longitude'] ?? null,
            $data['street'] ?? null,
            $data['city'] ?? null,
            $data['state'] ?? null,
            $data['country'] ?? null,
            $data['formattedAddress'] ?? null,
        );
    }
}
