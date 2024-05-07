@php
$images = $post->getMedia('inline_images')
@endphp
@unless($images->isEmpty())

    <img src="{{ $images->first()->getFullUrl() }}" class="border-8 border-sky-400 rounded object-cover" />

@endunless
