<x-layout>
    <div class="@container">
        <x-paragraph>
            Welcome to my homepage.
        </x-paragraph>

        <x-paragraph>
            This website has been around for almost 13 years now... shesh I feel old. Most of it has been my
            ramblings and chunterings. But there is a good portion of it I am proud of.
        </x-paragraph>

        <figure class="max-w-wide m-auto px-4 lg:px-8">
            <img src=" https://i.davidpeach.me/725/ArQYqZSCAAIyJEe.jpg" title="My website, circa 2012"
                class="border-8 border-purple-300" />
            <figcaption>My website, circa 2012</figcaption>
        </figure>


        <x-paragraph>
            I'm just a guy with a homepage. I love to tinker on the web. And in an age where we've lost most of what
            made
            the web special, I believe it's becoming more critical for people to own and control their own place on the
            web.
        </x-paragraph>

        <x-paragraph>
            I'm a programmer / web developer by trade, and it just so happens I love to play with the same stuff in
            my
            own time.
        </x-paragraph>

        <x-paragraph>
            On this site you'll find a range of topics I've posted about through the years.
        </x-paragraph>

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
                    $articles = App\Models\Post::where('kind', App\PostKind::ARTICLE)->latest()->limit(3)->get();
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
