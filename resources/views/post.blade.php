<x-layout>
<div class="@container h-entry mx-automax-w-7xl">
@if($post->title)
<x-bold-titled-wrapper titletag='h1'>
    <x-slot:title class="text-green-600">
        {{ $post->title }}
    </x-slot>
    <x-slot:contents class="lg:bg-green-600 text-white lg:my-16">
        @if ($post->excerpt)
        {{ $post->excerpt }}
        @endif
        <x-tag-list :tags="$post->tags" />
    </x-slot>
</x-bold-titled-wrapper>
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
