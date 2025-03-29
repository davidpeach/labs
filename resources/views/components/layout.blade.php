<!doctype html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>David Peach</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
    @livewireScripts()
</head>

<body>
    <div>
        <div>
            <x-site-nav-bar />

            <x-site-header />

            <main>
                {{ $slot }}
            </main>
            <x-tag-cloud />
            <x-site-footer />
        </div>
    </div>

</body>

</html>
