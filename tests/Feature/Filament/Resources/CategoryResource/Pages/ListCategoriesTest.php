<?php

use App\Filament\Resources\CategoryResource;
use App\Models\User;

it('can render the jam index admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(CategoryResource::getUrl('index'))->assertSuccessful();
});
