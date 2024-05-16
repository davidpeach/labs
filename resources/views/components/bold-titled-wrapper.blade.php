@props([
'titletag',
])
<section>
    <div class="max-w-wide m-auto px-4 sm:px-6 lg:px-8">
        @if($titletag === 'h1')
        <h1 {{ $title->attributes->merge(['class' => 'max-w-wide m-auto text-4xl md:text-4xl lg:text-7xl 2xl:text-[8rem]
            font-bold bottom-full leading-[2rem] lg:leading-[3.3rem] 2xl:leading-[5.5rem]
            uppercase']) }}>{{
            $title }}</h1>
        @else
        <p {{ $title->attributes->merge(['class' => 'max-w-wide m-auto text-4xl md:text-4xl lg:text-7xl 2xl:text-[8rem]
            font-bold bottom-full leading-[2rem] lg:leading-[3.3rem] 2xl:leading-[5.5rem] uppercase']) }}>{{
            $title }}</p>
        @endif
    </div>
    <div {{ $contents->attributes->merge(['class' => '']) }}>
        <div class="max-w-wide m-auto px-4 sm:px-6 lg:px-8">
            {{ $contents }}
        </div>
    </div>
</section>
