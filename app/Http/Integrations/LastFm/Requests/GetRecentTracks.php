<?php

namespace App\Http\Integrations\LastFm\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetRecentTracks extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        private ?int $fromTimestamp = null,
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
            'limit' => (int) config('services.lastfm.import_limit'),
        ];

        if (! is_null($this->fromTimestamp)) {
            $params['from'] = $this->fromTimestamp;
        }

        return $params;
    }
}
