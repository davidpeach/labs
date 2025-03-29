<x-layout>
<div>
<h1>Notes</h1>
@foreach($posts as $post)
<article>
    <img src="{{ $post->featured }}" />
    @if($post->title)
    <h2><a href="{{ $post->permalink }}">{{ $post->title }}</a></h2>
    @endif
    <time>{{ $post->published_at->format('jS F Y') }}</time>
    <x-excerpt-image :post="$post" :size="'square'" />

    <x-tag-list :tags="$post->tags"/>
</article>
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
