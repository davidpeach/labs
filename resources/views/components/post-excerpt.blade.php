<article>
    @if($post->title)
    <h2><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>excep
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    @else
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <div>{!! $post->content !!}</div>
    @endif
    <x-excerpt-image :post="$post" />

    <x-tag-list :tags="$post->tags"/>
</article>
