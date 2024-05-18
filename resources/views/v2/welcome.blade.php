<x-layout>
    <p>Welcome to my website. It's my little corner of the web where I feel happiest.</p>
    <p>This site has been up in various guises and domains for a little over ten years now,</p>
    <p>This current iteration was inspired by <a href="https://chriswere.wales">Chris Were's website</a>.</p>
    <section>
        <h2>Me online</h2>
        <ul>
            <li>This website</li>
            <li>Mastodon</li>
            <li>Github</li>
            <li>Twitter / X / Whatever (not active here)</li>
        </ul>
    </section>
    <section>
        <h2>Latest Articles</h2>
        <div>
            @foreach($articles as $article)
            <article>
                <h3>{{ $article->title }}</h3>
                <time>{{ $article->published_at->format('l jS F, Y') }} ({{ $article->published_at->diffForHumans() }})</time>
                <p>{{ $article->except }}</p>
            </article>
            @endforeach
        </div>
    </section>
    <section>
        <h2>Latest Notes</h2>
        <div>
            @foreach($notes as $note)
            <article>
                @if($note->title)
                <h3>{{ $note->title }}</h3>
                @endif
                <time>{{ $note->published_at->format('l jS F, Y') }} ({{ $note->published_at->diffForHumans() }})</time>
                <p>{!! $note->content !!}</p>
            </article>
            @endforeach
        </div>
    </section>
</x-layout>
