<?php

use App\Filament\Resources\PostResource;
use App\Models\User;

it('can render the post create admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(PostResource::getUrl('create'))->assertSuccessful();
});
