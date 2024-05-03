<x-layout>
<div class="mx-auto max-w-7xl prose lg:prose-2xl">
<x-page-title title="Posts" />
@foreach($posts as $post)
@php
$componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
@endphp
<x-dynamic-component :component="$componentName" :post="$post" />
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
