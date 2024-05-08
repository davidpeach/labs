<x-layout>
<div class="@container h-entry mx-automax-w-7xl">
@if($post->title)
<x-page-title :title="$post->title" />
@endif
<p class="sr-only">Written by <span class="p-author h-card">David Peach</span></p>
<time class="dt-published">{{ $post->published_at->format('jS F Y') }}</time>
<x-content>
{!! $post->content !!}
</x-content>

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
