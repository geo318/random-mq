<x-layout>
    <main class="flex flex-col justify-center  min-h-screen">
        <div class="flex flex-col items-center h-full max-w-6xl mx-auto mt-[228px] mb-[169px]">
            <div class="max-w-[700px] rounded-[10px] overflow-hidden">
                <img class="w-full" src="https://picsum.photos/700/400" alt="">
            </div>
            <x-title class="mt-[65px] mb-[114px]">{{ $movie->title }}</x-title>
            <x-title class="underline">{{ $quote->quote }}</x-title>
        </div>

    </main>
</x-layout>