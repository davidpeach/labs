<x-layout>
<div class="h-entry mx-auto prose lg:prose-xl prose-stone max-w-7xl">
@if($post->title)
<x-page-title :title="$post->title" />
@endif
<p class="sr-only">Written by <span class="p-author h-card">David Peach</span></p>
<time class="dt-published">{{ $post->published_at->format('jS F Y') }}</time>
<div class="e-content">
{!! $post->content !!}
</div>

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
