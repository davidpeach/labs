<x-layout>
    <div class="@container py-16">
        <section class="@7xl:flex @7xl:gap-8 max-w-wide m-auto">
            <div class="@7xl:w-9/12">

                <section class="px-4 lg:px-8 pb-8">
                    <h2 class="text-2xl border-b-2 pb-2 border-b-sky-200">Latest Articles</h2>
                    @php
                    $articles = App\Models\Post::where('kind',
                    App\PostKind::ARTICLE)->latest()->limit(7)->get();
                    @endphp
                    @foreach($articles as $post)
                    <article class="flex justify-between border-b-2 border-b-sky-200 py-2">
                        <h3 class="text-lg">{{ $post->title ?? 'Untitled article' }}</h3>
                        <time>{{ $post->published_at->format('jS F Y') }}</time>
                    </article>
                    @endforeach
                </section>

                <x-paragraph>
                    Welcome to my homepage. I love to tinker on the web. And in an age where we've lost most of
                    what
                    made
                    the web special, I believe it's becoming more critical for people to own and control their own place
                    on the
                    web.
                </x-paragraph>
                <x-paragraph>
                    I'm a programmer / web developer by trade, and it just so happens I love to play with the same stuff
                    in
                    my
                    own time.
                </x-paragraph>
                <x-paragraph>
                    On this site you'll find a range of topics I've posted about through the years.
                </x-paragraph>

                <x-paragraph>
                    <span class="font-bold italic">The site is still a work in progress as I finish migrating from my
                        old
                        system</span>
                </x-paragraph>
            </div>
            <figure class="">
                <img src="https://i.davidpeach.me/98/Black-and-white-portrait.jpg" width="800px" height="800px"
                    class="border-8 border-purple-400" />
                <figcaption>Abby: portait in black and white &mdash; The Last of Us part 2</figcaption>
            </figure>
        </section>

        <div class="my-16 lg:my-32">
            <x-bold-titled-wrapper titletag="'p'">
                <x-slot:title class="text-green-200">
                    latest photos
                    </x-slot>
                    <x-slot:contents class="bg-green-200 ">
                        <section class="grid md:grid-cols-3 gap-2 py-16 lg:py-32">
                            @php
                            $photos = App\Models\Post::where('kind', App\PostKind::PHOTO)->latest()->limit(6)->get();
                            @endphp
                            @foreach($photos as $post)
                            @php
                            $componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
                            @endphp
                            <x-dynamic-component :component="$componentName" :post="$post" />

                            @endforeach
                        </section>
                        </x-slot>
            </x-bold-titled-wrapper>
        </div>

        <div class="my-16 lg:my-32">
            <x-bold-titled-wrapper titletag="'p'">
                <x-slot:title class="text-amber-200">
                    latest articles
                    </x-slot>
                    <x-slot:contents class="bg-amber-200">
                        <section class="grid grid-cols-3 gap-2 py-16 lg:py-32 lg:gap-8">
                            @php
                            $articles = App\Models\Post::where('kind',
                            App\PostKind::ARTICLE)->latest()->limit(3)->get();
                            @endphp
                            @foreach($articles as $post)
                            @php
                            $componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
                            @endphp
                            <x-dynamic-component :component="$componentName" :post="$post" />

                            @endforeach
                        </section>
                        </x-slot>
            </x-bold-titled-wrapper>
        </div>

        <div class="my-16 lg:my-32">
            <x-bold-titled-wrapper titletag="'p'">
                <x-slot:title class="text-rose-300">
                    latest notes
                    </x-slot>
                    <x-slot:contents class="bg-rose-300">
                        <div class="py-16 lg:py-32">
                            @php
                            $photos = App\Models\Post::where('kind', App\PostKind::NOTE)->latest()->limit(3)->get();
                            @endphp
                            @foreach($photos as $post)
                            @php
                            $componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
                            @endphp
                            <x-dynamic-component :component="$componentName" :post="$post" />

                            @endforeach
                        </div>
                        </x-slot>
            </x-bold-titled-wrapper>
        </div>
    </div>
</x-layout>
