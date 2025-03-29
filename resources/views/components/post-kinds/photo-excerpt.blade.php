<article>
    @if($post->title)
    <h2><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    @endif
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <x-excerpt-image :post="$post" :size="'square'" />

    <x-tag-list :tags="$post->tags"/>
</article>






