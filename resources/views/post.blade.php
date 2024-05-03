<x-layout>
<div class="h-entry mx-auto prose lg:prose-xl prose-stone max-w-7xl">
<x-page-title :title="$post->title" />
<div class="e-content">
<time class="dt-published">{{ $post->published_at->format('jS F Y') }}</time>
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
