<x-layout>
<div class="mx-auto max-w-7xl prose lg:prose-2xl">
<x-page-title title="Posts" />
@foreach($posts as $post)
<x-post-excerpt :post="$post" />
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
