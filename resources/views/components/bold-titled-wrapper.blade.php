@props([
'titletag',
])
<section>
    <div class="aa">
        <p {{ $title->attributes->merge(['class' => 'max-w-wide m-auto px-4 lg:px-8 text-4xl md:text-4xl lg:text-7xl
            2xl:text-[8rem]
            font-bold bottom-full leading-[2rem] lg:leading-[3.3rem] 2xl:leading-[5.5rem] uppercase']) }}>{{
            $title }}</p>
    </div>
    @if($contents)
    <div {{ $contents->attributes->merge(['class' => '']) }}>
        <div class="max-w-wide m-auto py-4 px-4 lg:px-8">
            {{ $contents }}
        </div>
    </div>
    @endif
</section>
