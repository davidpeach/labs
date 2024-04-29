<?php

use App\Filament\Resources\ArtistResource;
use App\Models\User;

it('can render the artist index admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(ArtistResource::getUrl('index'))->assertSuccessful();
});
