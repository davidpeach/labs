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
@if($mode === 'wide')
<a href="{{ route($to ?? 'home') }}"
    class="inline-flex items-center border-b-2 border-transparent px-4 pt-1 text-sm font-bold text-gray-500 {{ $isCurrent ? 'bg-indigo-500 text-white':'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; }}">
    {{ $label }}
</a>
@elseif($mode === 'mobile')
<a href="{{ route($to ?? 'home') }}"
    class="block border-l-4 py-2 pl-3 pr-4 text-base font-medium {{ $isCurrent ? 'bg-indigo-50 border-indigo-500 text-indigo-700': 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">{{
    $label }}</a>
@endif
