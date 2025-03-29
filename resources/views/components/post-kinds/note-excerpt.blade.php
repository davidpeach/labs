<article>
    @if($post->title)
    <h2>{{ $post->title }}</h2>
    @endif
    <div>
{!! $post->content !!}
    </div>
    <time><a href="{{ $post->permalink }}">{{ $post->published_at->format('jS F Y') }}</a></time>
    <x-excerpt-image :post="$post" />

    <x-tag-list :tags="$post->tags"/>
</article>


