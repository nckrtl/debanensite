<?php

namespace NckRtl\DeBanensite;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class DeBanensiteConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct()
    {
        $bearerToken = Cache::get('debanensite-bearer-token');

        if (! $bearerToken) {
            $response = Http::asForm()->post('https://accounts.debanensite.nl/token', [
                'client_id' => config('auth.debanensite_api_key'),
                'client_secret' => config('debanensite.client_secret'),
                'grant_type' => 'client_credentials',
                'scope' => 'REST_API',
            ]);

            $bearerToken = $response->json('access_token');

            Cache::put('debanensite-bearer-token', $bearerToken, $response->json('expires_in'));
        }

        $this->withTokenAuth($bearerToken);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.debanensite.nl';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    public function defaultConfig(): array
    {
        return [
            'timeout' => 120,
        ];
    }
}
