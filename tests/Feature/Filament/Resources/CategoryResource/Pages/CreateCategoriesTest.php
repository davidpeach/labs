<?php

use App\Filament\Resources\CategoryResource;
use App\Models\User;

it('can render the category create admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(CategoryResource::getUrl('create'))->assertSuccessful();
});
