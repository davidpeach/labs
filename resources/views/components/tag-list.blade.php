@unless($tags->isEmpty())
    <p class=""><span class="sr-only">Tags</span>
    @foreach($tags as $tag)
        <a href="{{ $tag->permalink }}" class=" bg-purple-700 rounded-lg text-white inline-block text-lg px-4 py-2 mr-2">{{ $tag->name }}</a>
    @endforeach
    </p>
@endunless
