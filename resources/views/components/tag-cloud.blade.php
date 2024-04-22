<section class="bg-sky-200 ">
    <div class="max-w-7xl m-auto px-6 lg:px-8 py-16">
        <p class="text-5xl mb-6">Obligatory Tag Cloud</p>
        <ul class="leading-10 text-3xl">
            @foreach($tags as $tag)
            <li class="inline-block [&:not(:last-child)]:after:content-[',']">
                <a href="{{ route('tag.show', $tag) }}" class="hover:underline">{{ $tag->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
