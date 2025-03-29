@unless($tags->isEmpty())
    <p>Tags:
    @foreach($tags as $tag)
        <a href="{{ $tag->permalink }}">{{ $tag->name }}</a>
    @endforeach
    </p>
@endunless
