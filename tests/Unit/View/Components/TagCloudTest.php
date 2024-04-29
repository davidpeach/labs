<?php

use App\Models\Tag;
use App\View\Components\TagCloud;

test('the tag cloud will correctly render all tags', function () {
    $tagOne = Tag::create([
        'name' => 'Tag One',
    ]);
    $tagTwo = Tag::create([
        'name' => 'Tag Two',
    ]);
    $tagThree = Tag::create([
        'name' => 'Tag Three',
    ]);

    $this->component(TagCloud::class)
        ->assertSee($tagOne->name)
        ->assertSee($tagTwo->name)
        ->assertSee($tagThree->name);
});
