@php
$images = $post->getMedia('inline_images');
$size = $size ?? '';
@endphp
@unless($images->isEmpty())

    <img src="{{ $images->first()->getFullUrl($size) }}" class="border-8 border-sky-400 rounded object-cover" />

@endunless
