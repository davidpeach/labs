<x-layout>
<div class="mx-auto prose">
<h1 class="text-5xl">Posts</h1>
@foreach($posts as $post)
<article>
    <h2 class="text-2xl">{{ $post->title }}</h2>
    <p><a href="{{ $post->wp_url }}">Link</a></p>
</article>
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
