<x-layout>
    <div class="@container h-entry mx-auto max-w-wide px-4 lg:px-8 py-16">
        @if($post->title)
        <h1 class='max-w-wide m-auto text-4xl md:text-4xl lg:text-7xl 2xl:text-[8rem]
            font-bold bottom-full leading-[2rem] lg:leading-[5rem] 2xl:leading-[8rem]
            uppercase text-green-600'>{{ $post->title }}</h1>
        @if($post->excerpt)
        {{ $post->excerpt }}
        @endif
        <p class="dt-published text-2xl xl:text-3xl">Published on <time>{{
                $post->published_at->format('jS F Y') }}</time></p>
        @endif
        <p class="sr-only">Written by <span class="p-author h-card">David Peach</span></p>
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
