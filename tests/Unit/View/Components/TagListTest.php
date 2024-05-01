<?php

use App\Models\Tag;
use App\View\Components\TagList;

test('The tags list will show the name of all tags passed to it', function () {
    $tagOne = Tag::factory()->create();
    $tagTwo = Tag::factory()->create();

    $this->component(TagList::class, ['tags' => collect([$tagOne, $tagTwo])])
        ->assertSee($tagOne->name)
        ->assertSee($tagTwo->name);
});
