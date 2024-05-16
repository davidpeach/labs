<div class="my-16 lg:my-32">
<x-bold-titled-wrapper titletag="'p'">
    <x-slot:title class="text-sky-200">
        tags
    </x-slot>
    <x-slot:contents class="bg-sky-200">
        <ul class="leading-10 text-sm lg:text-xl uppercase tracking-wide">
            @foreach($tags as $tag)
            <li class="inline-block my-2 lg:my-2 lg:mx-1">
                <a href="{{ route('tag.show', $tag) }}" class="bg-yellow-100 py-1 px-2 lg:py-2 lg:px-4 inline-block hover:bg-purple-500">{{ $tag->name }}</a>
            </li>
            @endforeach
        </ul>
    </x-slot>
</x-bold-titled-wrapper>
</div>
