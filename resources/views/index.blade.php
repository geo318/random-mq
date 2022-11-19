<x-layout>
    <div class="flex flex-col items-center h-full max-w-6xl mx-auto mt-[14.25rem] mb-[10.563rem]">
        @if($movie)
            <div class="max-w-[43.75rem] rounded-[0.625rem] overflow-hidden">
                <img class="w-full" src="{{ $quote->thumbnail ? asset('storage/' . $quote->thumbnail) : 'https://picsum.photos/700/386' }}" alt="">
            </div>
            <x-title class="mt-[4.063rem] mb-[7.125rem]">{{ $quote->quote }}</x-title>
            <a href="{{ route('quotes', [app()->currentLocale(), $movie->slug])  }}">
                <x-title class="underline">{{ $movie->title }}</x-title>
            </a>
        @else
            <p>{{ __('No movies yet') }}</p>
        @endif

    </div>
</x-layout>