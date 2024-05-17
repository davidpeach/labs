<x-layout>
<div class="mx-auto max-w-wide px-4 lg:px-8">
<x-page-title :title="$posts->first()->kind->getLabel() . 's'" />
@foreach($posts as $post)
@php
$componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
@endphp
<x-dynamic-component :component="$componentName" :post="$post" />
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
