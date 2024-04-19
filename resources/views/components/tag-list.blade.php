@unless($tags->isEmpty())
    <p class="bg-blue-500 text-white p-1">
    @foreach($tags as $tag)
        <span>{{ $tag->name }}</span> |
    @endforeach
    </p>
@endunless
