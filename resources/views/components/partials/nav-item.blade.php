                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
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
<a
    href="{{ route($to ?? 'home') }}"
    class="hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ $isCurrent ? 'bg-gray-50 text-indigo-600':'text-white'; }}">
    <x-dynamic-component :component="'icons.' . strtolower($label)" class="mt-4" />
    {{ $label }}
</a>

