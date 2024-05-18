<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>David Peach's Website</title>
    @vite(['resources/v2/css/app.css'])
    @livewireStyles()
    @livewireScripts()
</head>

<body>
    <div class="page-wrap">
        <header>
            <h1>David Peach's homepage</h1>
        </header>
        <nav>
            <ul>
                <li>
                    <a href="/">home</a>
                </li>
            </ul>
        </nav>
        <main>
            {{ $slot }}
        </main>
        <footer>
            <p>the footer</p>
        </footer>
    </div>
</body>

</html>
