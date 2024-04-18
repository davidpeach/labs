<x-layout>
<div class="mx-auto prose">
<h1>{{ $post->title }}</h1>
{!! $post->content !!}

@php
$images = $post->getMedia('inline_images')
@endphp
@unless($images->isEmpty())

@foreach($images as $image)
    <img src="{{ $image->getFullUrl() }}" />
@endforeach

@endunless
</div>
</x-layout>
