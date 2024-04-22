<x-layout>
<div class="mx-auto prose lg:prose-xl prose-stone max-w-7xl">
<x-page-title title="Posts" />
@livewire('new-posts')
@foreach($posts as $post)
<x-post-excerpt :post="$post" />
@endforeach
{{ $posts->links() }}
<div>
</x-layout>
