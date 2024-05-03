<article class="border-solid border-b-2 border-b-gray-400 pb-4 pt-4">
    <h2 class="text-2xl"><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    @if ($post->excerpt)
        <p>{{ $post->excerpt }}</p>
    @endif
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <x-excerpt-image :post="$post" />
    <x-tag-list :tags="$post->tags"/>
</article>

