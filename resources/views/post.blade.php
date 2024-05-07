<x-layout>
<div class="@container h-entry mx-automax-w-7xl">
@if($post->title)
<x-page-title :title="$post->title" />
@endif
<p class="sr-only">Written by <span class="p-author h-card">David Peach</span></p>
<time class="dt-published">{{ $post->published_at->format('jS F Y') }}</time>
<div class="e-content prose @lg:prose-2xl prose-stone max-w-wide @md:prose-p:text-xl @md:prose-p:leading-loose @lg:prose-p:text-2xl @lg:prose-p:leading-looser @xl:prose-p:text-3xl @xl:prose-p:leading-looser @2xl:prose-p:text-4xl @2xl:prose-p:leading-looser py-8">
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
