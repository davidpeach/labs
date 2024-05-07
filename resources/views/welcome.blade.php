<x-layout>
    <div class="mx-auto max-w-wide px-6 lg:px-8">
        <x-paragraph>
            Welcome to my homepage.
        </x-paragraph>

        <x-paragraph>
            This website has been around for almost 13 years now... shesh I feel old. Most of it has been my
            ramblings and chunterings. But there is a good portion of it I am proud of.
        </x-paragraph>

        <figure>
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

        <h2>Latest Photos</h2>
        <section class="grid md:grid-cols-3 gap-2 py-32">
            @php
            $photos = App\Models\Post::where('kind', App\PostKind::PHOTO)->latest()->limit(3)->get();
            @endphp
            @foreach($photos as $post)
            @php
            $componentName = 'post-kinds.' . $post->kind->getViewName() . '-excerpt';
            @endphp
            <x-dynamic-component :component="$componentName" :post="$post" />

            @endforeach
        </section>
        <h2>Latest Articles</h2>
        <section class="grid grid-cols-3 gap-2 py-32">
            @php
            $photos = App\Models\Post::where('kind', App\PostKind::ARTICLE)->latest()->limit(3)->get();
            @endphp
            @foreach($photos as $photo)
            <article>
                <x-post-excerpt :post="$photo" />
            </article>
            @endforeach
        </section>
        <h2>Latest Notes</h2>
        <section class="py-32">
            @php
            $photos = App\Models\Post::where('kind', App\PostKind::NOTE)->latest()->limit(3)->get();
            @endphp
            @foreach($photos as $photo)
            <article class="">
                <x-post-excerpt :post="$photo" />
            </article>
            @endforeach
        </section>
    </div>
</x-layout>
