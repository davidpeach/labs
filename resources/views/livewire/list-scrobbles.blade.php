<section>
    <x-page-title title="Listens" />
    <livewire:now-listening-to />
    <hr>
    {!! $listens->links() !!}
    @foreach ($listens as $listen)
        <div wire:key="{{ $listen->id }}">
            <h2>{{ $listen->song->title }}</h2>
            <p>{{ $listen->song->artist->name }}</p>
            <time>{{ (new \Carbon\Carbon($listen->started_at))->diffForHumans() }}</time>
        </div>
    @endforeach
    {!! $listens->links() !!}
</section>
