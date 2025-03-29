<x-layout>
<div>
        <h1>Photos</h1>
<div>
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
