<x-layout>
    <div>
        <section>
            <div>

                <section>
                    <h2>Latest Articles</h2>
                    @php
                    $articles = App\Models\Post::where('kind',
                    App\PostKind::ARTICLE)->latest()->limit(7)->get();
                    @endphp
                    @foreach($articles as $post)
                    <article>
                        <h3>{{ $post->title ?? 'Untitled article' }}</h3>
                        <time>{{ $post->published_at->format('jS F Y') }}</time>
                    </article>
                    @endforeach
                </section>

                <p>
                    Welcome to my homepage. I love to tinker on the web. And in an age where we've lost most of
                    what
                    made
                    the web special, I believe it's becoming more critical for people to own and control their own place
                    on the
                    web.
                </p>
                <p>
                    I'm a programmer / web developer by trade, and it just so happens I love to play with the same stuff
                    in
                    my
                    own time.
                </p>
                <p>
                    On this site you'll find a range of topics I've posted about through the years.
                </p>

                <p>
                    <span class="font-bold italic">The site is still a work in progress as I finish migrating from my
                        old
                        system</span>
                </p>
            </div>
            <figure>
                <img src="https://i.davidpeach.me/98/Black-and-white-portrait.jpg" width="800px" height="800px"
                   />
                <figcaption>Abby: portait in black and white &mdash; The Last of Us part 2</figcaption>
            </figure>
        </section>
</x-layout>
