<article class="@container border-solid border-b-2 border-b-gray-400 py-16">
    @if($post->title)
    <h2 class="text-2xl @md:text-3xl @lg:text-4xl @xl:text-5xl mb-4">{{ $post->title }}</h2>
    @endif
<x-content>
{!! $post->content !!}
</x-content>
    <time class="mb-4"><a href="{{ $post->permalink }}">{{ $post->published_at->format('jS F Y') }}</a></time>
    <x-excerpt-image :post="$post" />

    <x-tag-list :tags="$post->tags"/>
</article>


