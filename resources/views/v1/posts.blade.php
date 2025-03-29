<x-layout>
<div>
<x-page-title :title="$posts->first()?->kind->getLabel() . 's'" />
@foreach($posts as $post)
@php
$componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
@endphp
<x-dynamic-component :component="$componentName" :post="$post" />
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
