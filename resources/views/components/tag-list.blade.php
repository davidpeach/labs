@unless($tags->isEmpty())
    <p class="py-8"><span class="sr-only">Tags</span>
    @foreach($tags as $tag)
        <a href="{{ $tag->permalink }}" class="bg-yellow-100 py-1 px-2 lg:py-2 lg:px-4 inline-block hover:bg-yellow-400 uppercase">{{ $tag->name }}</a>
    @endforeach
    </p>
@endunless
