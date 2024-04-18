<article class="border-solid border-b-2 border-b-gray-400 pb-4 pt-4">
    @if($post->title)
    <h2 class="text-2xl"><a href="{{ $post->wp_url }}">{{ $post->title }}</a></h2>
    @else
    <div>{!! $post->content !!}</div>
    @endif
    <x-excerpt-image :post="$post" />
</article>
