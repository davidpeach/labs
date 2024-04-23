<section>
    <x-page-title title="Listens" />
    <livewire:now-listening-to />
    <hr class="my-10">
    {!! $listens->links() !!}

    <div class="flow-root my-10">
        <ul role="list" class="-mb-8">
            @foreach ($listens as $listen)
            <li wire:key="{{ $listen->id }}">
                <div class="relative pb-8">
                    <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                    <div class="relative flex space-x-3">
                        <div>
                            <span
                                class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                            </span>
                        </div>
                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                            <div>
                                <p class="text-sm text-gray-500">Listened to <a href="#"
                                        class="font-medium text-gray-900">{{ $listen->song->title }} by {{
                                        $listen->song->artist->name }}</a></p>
                            </div>
                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
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



    {!! $listens->links() !!}
</section>
