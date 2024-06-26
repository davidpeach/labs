<?php

use App\Filament\Resources\PostResource;
use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Models\User;
use App\PostKind;
use Carbon\Carbon;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

it('can render the post create admin page', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    $this->get(PostResource::getUrl('create'))->assertSuccessful();
});

it('can create a new article post using the create form', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    livewire(CreatePost::class)
        ->fillForm([
            'title' => 'Test Article Title',
            'slug' => 'test-article-title',
            'published_at' => new Carbon('25th December 1997'),
            'kind' => PostKind::ARTICLE,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas('posts', [
        'title' => 'Test Article Title',
        'slug' => 'test-article-title',
        'published_at' => new Carbon('25th December 1997'),
        'kind' => PostKind::ARTICLE,
    ]);
});

test('not supplying a slug will auto-generate one from the title', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    livewire(CreatePost::class)
        ->fillForm([
            'title' => 'Test Article Title',
            'published_at' => new Carbon('25th December 1997'),
            'kind' => PostKind::ARTICLE,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas('posts', [
        'title' => 'Test Article Title',
        'slug' => 'test-article-title',
        'published_at' => new Carbon('25th December 1997'),
        'kind' => PostKind::ARTICLE,
    ]);
});

test('not supplying a slug will auto-generate one from the markdown field if no title present', function () {
    $this->actingAs(User::factory()->create(['email' => 'test@davidpeach.co.uk']));
    livewire(CreatePost::class)
        ->fillForm([
            'markdown' => 'This is the content that should be made into a slug',
            'published_at' => new Carbon('25th December 1997'),
            'kind' => PostKind::ARTICLE,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas('posts', [
        'title' => null,
        'slug' => 'this-is-the-content-that-should-be-made-into-a-slu',
        'published_at' => new Carbon('25th December 1997'),
        'kind' => PostKind::ARTICLE,
    ]);
});
