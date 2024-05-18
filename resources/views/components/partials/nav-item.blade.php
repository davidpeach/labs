@php
$isCurrent = false;

$current = Route::currentRouteName();
$exploded = explode('.', $current);

if($exploded[0] === 'post') {
$exploded = explode('/', Request::path());
$isCurrent = str_starts_with($exploded[0], $route);
} else {
$isCurrent = ($exploded[0] === $route);
}

@endphp
<a href="{{ route($to ?? 'home') }}"
    class="h-8 lg:h-16 inline-flex items-center border-b-2 border-transparent px-4 pt-1 text-sm font-bold text-gray-500 {{ $isCurrent ? 'bg-indigo-500 text-white':'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; }}">
    {{ $label }}
</a>
