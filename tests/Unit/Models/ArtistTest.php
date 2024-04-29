<?php

use App\ArtistCreditType;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('media conversions', function () {
    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);

    expect($artist->mediaConversions)->toHaveCount(0);

    $artist->registerMediaConversions(null);

    expect($artist->mediaConversions)->toHaveCount(1);
});

test('media collections', function () {
    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);

    expect($artist->mediaCollections)->toHaveCount(0);

    $artist->registerMediaCollections(null);

    expect($artist->mediaCollections)->toHaveCount(1);
});

test('an artist can have songs', function () {
    // TODO next
    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);
    $songOne = Song::create([
        'title' => 'The Song',
        'artist_id' => $artist->id,
    ]);
    $songTwo = Song::create([
        'title' => 'The Song',
        'artist_id' => $artist->id,
    ]);
    $artist->songs()->attach($songOne->id, ['credit_type' => ArtistCreditType::PERFORMER]);
    $artist->songs()->attach($songTwo->id, ['credit_type' => ArtistCreditType::PERFORMER]);

    expect($artist->songs->count())->toEqual(2);
});

test('something', function () {
    config()->set('media-library.disk_name', 'local');
    Storage::fake('local');

    $artist = Artist::create([
        'name' => 'Test Artist',
        'mbid' => '111',
    ]);

    $file = UploadedFile::fake()->image('some-file.jpg');

    $artist->addMedia($file)
        ->toMediaCollection('artist_avatar');

    $avatar = $artist->getMedia('artist_avatar')->first();

    expect($artist->avatar)->toEqual($avatar->getUrl('preview'));
});
