<article>
    <h2><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    @if ($post->excerpt)
    <div>
        {{ $post->excerpt }}
        </div>
    @endif
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <x-excerpt-image :post="$post" />
    <x-tag-list :tags="$post->tags"/>
</article>

