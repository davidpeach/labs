<x-layout>
<div class="@container">
<x-page-title title="Photos" />
<div class="grid gap-4 @2xl:grid-cols-2 @5xl:grid-cols-3 max-w-wide m-auto">
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
