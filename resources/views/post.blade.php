<x-layout>
<div class="mx-auto prose lg:prose-xl prose-stone max-w-7xl">
<x-page-title :title="$post->title" />
{!! $post->content !!}

@php
$images = $post->getMedia('inline_images')
@endphp
@unless($images->isEmpty())

@foreach($images as $image)
    <img src="{{ $image->getFullUrl() }}" />
@endforeach

@endunless
<x-tag-list :tags="$post->tags" />
</div>
</x-layout>
