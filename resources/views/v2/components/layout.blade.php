<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>David Peach's Website</title>
    @vite(['resources/v2/css/app.css', 'resources/v2/js/app.js'])
    @livewireStyles()
    @livewireScripts()
</head>

<body class="bg-purple-200">
    <div>
        <div>
            <x-site-nav-bar />

            <x-site-header />

            {{-- <main class="px-4 sm:px-6 lg:px-8 py-16  max-w-wide m-auto"> --}}
            <main>
                {{ $slot }}

            </main>
            <x-tag-cloud />
            <x-site-footer />
        </div>
    </div>

</body>

</html>


