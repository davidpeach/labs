@props([
'titletag',
])
<section>
    <div>
        <p>{{ $title }}</p>
    </div>
    @if($contents)
    <div>
        <div>
            {{ $contents }}
        </div>
    </div>
    @endif
</section>
