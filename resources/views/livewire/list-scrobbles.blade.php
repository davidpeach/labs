<section>
    <p>listens</p>
    @foreach ($listens as $listen)
        <div wire:key="{{ $listen->id }}">
            <h2>{{ $listen->song->title }}</h2>
            <time>{{ (new \Carbon\Carbon($listen->started_at))->diffForHumans() }}</time>
        </div>
    @endforeach
    {!! $listens->links() !!}
</section>
