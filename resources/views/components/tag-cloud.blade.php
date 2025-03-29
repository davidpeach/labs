<div>
<x-bold-titled-wrapper titletag="'p'">
    <x-slot:title>
        tags
    </x-slot>
    <x-slot:contents>
        <ul>
            @foreach($tags as $tag)
            <li>
                <a href="{{ route('tag.show', $tag) }}">{{ $tag->name }}</a>
            </li>
            @endforeach
        </ul>
    </x-slot>
</x-bold-titled-wrapper>
</div>
