@php
$images = $post->getMedia('inline_images');
$size = $size ?? '';
@endphp
@unless($images->isEmpty())

    <img src="{{ $images->first()->getFullUrl($size) }}" />

@endunless
