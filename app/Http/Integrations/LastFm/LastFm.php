<?php

namespace App\Http\Integrations\LastFm;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class LastFm extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'http://ws.audioscrobbler.com/2.0/';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
