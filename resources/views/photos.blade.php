<x-layout>
<div class="@container mx-auto max-w-7xl">
<x-page-title title="Posts" />
<div class="grid gap-4 @2xl:grid-cols-2 @5xl:grid-cols-3">
@foreach($posts as $post)
@php
$componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
@endphp
<x-dynamic-component :component="$componentName" :post="$post" />
@endforeach
</div>
{{ $posts->links() }}
<div>
</x-layout>
