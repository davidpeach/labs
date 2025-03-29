<x-layout>
    <div>
        <img src="{{ $post->featured }}" />
        @if($post->title)
        <h1>{{ $post->title }}</h1>
        @if($post->excerpt)
        {{ $post->excerpt }}
        @endif
        <p>Published on <time>{{
                $post->published_at->format('jS F Y') }}</time></p>
        @endif
        <p>Written by <span class="p-author h-card">David Peach</span></p>
        <div>
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
