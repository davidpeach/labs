<article class="@container border-solid border-b-2 border-b-gray-400 pb-4 pt-4">
    <h2 class="text-2xl @md:text-3xl @lg:text-4xl @xl:text-5xl mb-4"><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    @if ($post->excerpt)
        <x-paragraph>{{ $post->excerpt }}</x-paragraph>
    @endif
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <x-excerpt-image :post="$post" />
    <x-tag-list :tags="$post->tags"/>
</article>

