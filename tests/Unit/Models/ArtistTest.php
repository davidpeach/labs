<?php

use App\ArtistCreditType;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('media conversions', function () {
    $artist = Artist::factory()->create();

    expect($artist->mediaConversions)->toHaveCount(0);

    $artist->registerMediaConversions(null);

    expect($artist->mediaConversions)->toHaveCount(1);
});

test('media collections', function () {
    $artist = Artist::factory()->create();

    expect($artist->mediaCollections)->toHaveCount(0);

    $artist->registerMediaCollections(null);

    expect($artist->mediaCollections)->toHaveCount(1);
});

test('an artist can have songs', function () {
    $songOne = Song::factory()->create();
    $songTwo = Song::factory()->create();
    $artist = Artist::factory()->create();
    $artist->songs()->attach($songOne->id, ['credit_type' => ArtistCreditType::PERFORMER]);
    $artist->songs()->attach($songTwo->id, ['credit_type' => ArtistCreditType::PERFORMER]);

    expect($artist->songs->count())->toEqual(2);
});

test('the artist avatar can be returned', function () {
    config()->set('media-library.disk_name', 'local');
    Storage::fake('local');

    $artist = Artist::factory()->create();

    $file = UploadedFile::fake()->image('some-file.jpg');

    $artist->addMedia($file)
        ->toMediaCollection('artist_avatar');

    $avatar = $artist->getMedia('artist_avatar')->first();

    expect($artist->avatar)->toEqual($avatar->getUrl('preview'));
});
