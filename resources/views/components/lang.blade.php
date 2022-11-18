@props(['link'])
<div {{ $attributes(['class' => "w-[3.625rem] h-[3.625rem] rounded-full border-2 border-white text-[1.5rem]"]) }}>
    <a href="{{ $link }}" class="w-full h-full flex justify-center items-center">
        {{ $slot }}
    </a>
</div>