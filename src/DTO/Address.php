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
            $data['zipcode'],
            $data['houseNumber'],
            $data['houseNumberSuffix'],
            $data['latitude'],
            $data['longitude'],
            $data['street'],
            $data['city'],
            $data['state'],
            $data['country'],
            $data['formattedAddress'],
        );
    }
}
