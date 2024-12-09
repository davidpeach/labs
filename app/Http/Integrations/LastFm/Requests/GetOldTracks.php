<?php

namespace App\Http\Integrations\LastFm\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOldTracks extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        private ?int $toTimestamp = null,
    ) {

    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '?method=user.getrecenttracks';
    }

    protected function defaultQuery(): array
    {
        $params = [
            'api_key' => config('services.lastfm.api_key'),
            'format' => config('services.lastfm.import_format'),
            'user' => config('services.lastfm.import_username'),
            'limit' => config('services.lastfm.import_limit'),
        ];

        if (! is_null($this->toTimestamp)) {
            $params['to'] = $this->toTimestamp;
        }

        return $params;
    }
}
