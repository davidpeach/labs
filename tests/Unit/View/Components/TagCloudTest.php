<?php

use App\Models\Tag;
use App\View\Components\TagCloud;

test('the tag cloud will correctly render all tags', function () {
    $tagOne = Tag::factory()->create();
    $tagTwo = Tag::factory()->create();
    $tagThree = Tag::factory()->create();

    $this->component(TagCloud::class)
        ->assertSee($tagOne->name)
        ->assertSee($tagTwo->name)
        ->assertSee($tagThree->name);
});
