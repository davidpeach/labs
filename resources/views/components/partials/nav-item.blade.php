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
<a href="{{ route($to ?? 'home') }}">
    {{ $label }}
</a>
