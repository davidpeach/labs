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
            'format' => 'json',
            'user' => 'david_peach',
        ];

        if (! is_null($this->fromTimestamp)) {
            $params['from'] = $this->fromTimestamp;
        }

        if (! is_null($this->toTimestamp)) {
            $params['to'] = $this->toTimestamp;
        }

        return $params;
    }
}
