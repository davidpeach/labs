<section>
    <h1>Listens</h1>
    <livewire:now-listening-to />
    <hr>
    {!! $this->listens->links() !!}

    <div>
        <ul role="list">
            @foreach ($this->listens as $listen)
            <li wire:key="{{ $listen->id }}">
                <div>
                    <div>
                        <div>
                            <span>
                            </span>
                        </div>
                        <div>
                            <div>
                                <p>Listened to <a href="#">{{ $listen->song->title }} by {{
                                        $listen->song->artist->name }}</a></p>
                                        @auth
                                        <livewire:jam-it wire:key="jam-it-{{ $listen->id }}" song="{{ $listen->song->id }}"/>
                                        @endauth
                            </div>
                            <div>
                                <time></time>
                                <time datetime="{{ (new \Carbon\Carbon($listen->started_at))->format('Y-m-d') }}">{{
                                    (new \Carbon\Carbon($listen->started_at))->diffForHumans() }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>



    {!! $this->listens->links() !!}
</section>
