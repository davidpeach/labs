<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>David Peach</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="py-10 px-5">
        <div class="prose mx-auto">
            <header>
                <h1 class="text-5xl">David Peach's website</h1>
            </header>
            <nav>
                <a href="/">home</a>
                <a href="/posts">posts</a>
                <a href="/listens">listens</a>
            </nav>
            <main class="py-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
