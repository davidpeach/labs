<section class="bg-sky-200 relative my-40">
    <div class="max-w-wide m-auto px-6 lg:px-8 py-16">
        <p class="text-2xl md:text-4xl lg:text-7xl 2xl:text-[8rem] font-bold text-sky-200 absolute bottom-full leading-[2rem] lg:leading-[3.3rem] 2xl:leading-[5.5rem] uppercase">Website Tags</p>
        <ul class="leading-10 text-sm lg:text-xl uppercase tracking-wide">
            @foreach($tags as $tag)
            <li class="inline-block my-2 lg:my-2 lg:mx-1">
                <a href="{{ route('tag.show', $tag) }}" class="bg-yellow-100 py-1 px-2 lg:py-2 lg:px-4 inline-block hover:bg-purple-500">{{ $tag->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
