<x-layout>
    <div class="flex flex-col items-center min-h-screen">
        <x-title class="flex my-[5rem]">{{ $movie->title }}</x-title>
        
        @foreach ($movie->quotes as $quote)          
            <div class="max-w-[46.75rem] rounded-[0.625rem] mb-[4.188rem] overflow-hidden bg-white">
                <img class="w-full" max-h-[26rem] src="https://picsum.photos/750/420?random={{ $quote->id }}" alt="">
                <div class="flex items-center bg-white">
                    <h2 class="mt-[2.125rem] mb-[2.813rem] px-[1.125rem] text-[2.25rem] text-black">{{ $quote->quote }}</h2>
                </div>
            </div> 
        @endforeach

    </div>
</x-layout>