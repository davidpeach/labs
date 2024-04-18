@php
$images = $post->getMedia('inline_images')
@endphp
@unless($images->isEmpty())

    <img src="{{ $images->first()->getFullUrl() }}" />

@endunless
