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

    public function __construct(private int $toTimestamp = 1)
    {

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
        return [
            'api_key' => config('services.lastfm.api_key'),
            'format' => 'json',
            'user' => 'david_peach',
            'to' => $this->toTimestamp,
        ];
    }
}
