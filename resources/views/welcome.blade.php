<x-layout>
    <div
        class="mx-auto prose lg:prose-2xl prose-stone max-w-wide md:prose-p:leading-relaxed md:prose-p:text-2xl lg:prose-p:leading-loose lg:prose-p:text-3xl xl:prose-p:leading-loose xl:prose-p:text-4xl">
        <p>Welcome to my homepage.

        <p>This website has been around for almost 13 years now... shesh I feel old. Most of it has been my ramblings
            and chunterings. But there is a good portion of it I am proud of.

        <figure>
            <img src="https://i.davidpeach.me/725/ArQYqZSCAAIyJEe.jpg" title="My website, circa 2012"
                class="border-8 border-purple-300" />
            <figcaption>My website, circa 2012</figcaption>
        </figure>


        <p>I'm just a guy with a homepage. I love to tinker on the web. And in an age where we've lost most of what made
            the web special, I believe it's becoming more critical for people to own and control their own place on the
            web.

        <p>I'm a programmer / web developer by trade, and it just so happens I love to play with the same stuff in my
            own time.

        <p>On this site you'll find a range of topics I've posted about through the years.

        <h2>Latest Photos</h2>
        <section class="grid grid-cols-3 gap-2 border-b-4 border-b-black border-dashed">
            @php
            $photos = App\Models\Post::where('kind', App\PostKind::PHOTO)->latest()->limit(3)->get();
            @endphp
            @foreach($photos as $photo)
            <article class="">
                <h3>{{ $photo->title }}</h3>
                <x-excerpt-image :post="$photo" :size="'square'" />
            </article>
            @endforeach
        </section>
        <h2>Latest Articles</h2>
        <section class="grid grid-cols-3 gap-2 border-b-4 border-b-black border-dashed">
            @php
            $photos = App\Models\Post::where('kind', App\PostKind::ARTICLE)->latest()->limit(3)->get();
            @endphp
            @foreach($photos as $photo)
            <article class="">
                <x-post-excerpt :post="$photo" />
            </article>
            @endforeach
        </section>
        <h2>Latest Notes</h2>
        <section class="">
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
