<x-layout>
    <div class="flex flex-col items-center h-full max-w-6xl mx-auto mt-[14.25rem] mb-[10.563rem]">
        <div class="max-w-[43.75rem] rounded-[0.625rem] overflow-hidden">
            <img class="w-full" src="https://picsum.photos/700/386" alt="">
        </div>
        <x-title class="mt-[4.063rem] mb-[7.125rem]">{{ $quote->quote }}</x-title>
        <a href="{{ route('quotes', [app()->currentLocale(), $movie->slug])  }}">
            <x-title class="underline">{{ $movie->title }}</x-title>
        </a>
    </div>
</x-layout>