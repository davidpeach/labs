<article class="@container py-16 bg-purple-300 border-purple-400 border-2 px-8 my-8">
    <h2 class="text-2xl @md:text-3xl @lg:text-4xl @xl:text-5xl mb-4"><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    @if ($post->excerpt)
        <x-content>
        {{ $post->excerpt }}
        </x-content>
    @endif
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <x-excerpt-image :post="$post" />
    <x-tag-list :tags="$post->tags"/>
</article>

