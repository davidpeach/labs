<x-layout>
<div class="mx-auto max-w-7xl">
<x-page-title title="Posts" />
@foreach($posts as $post)
<x-post-excerpt :post="$post" />
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
