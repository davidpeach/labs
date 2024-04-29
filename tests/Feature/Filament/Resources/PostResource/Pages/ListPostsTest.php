<?php

use App\Filament\Resources\PostResource;
use App\Models\User;

it('can render the post index admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(PostResource::getUrl('index'))->assertSuccessful();
});
