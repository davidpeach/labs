<article class="@container border-solid border-b-2 border-b-gray-400 pb-4 pt-4">
    @if($post->title)
    <h2 class="text-2xl @md:text-2xl @lg:text-3xl @xl:text-4xl"><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    @else
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <div class="prose">{!! $post->content !!}</div>
    @endif
    <x-excerpt-image :post="$post" :size="'square'" />

    <x-tag-list :tags="$post->tags"/>
</article>



