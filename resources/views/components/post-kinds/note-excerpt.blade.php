<article class="border-solid border-b-2 border-b-gray-400 pb-4 pt-4">
    @if($post->title)
    <h2 class="text-xl">{{ $post->title }}</h2>
    @endif
    <div class="text-base md:text-xl lg:text-3xl">{!! $post->content !!}</div>
    <time class=""><a href="{{ $post->permalink }}">{{ $post->published_at->format('jS F Y') }}</a></time>
    <x-excerpt-image :post="$post" />

    <x-tag-list :tags="$post->tags"/>
</article>


