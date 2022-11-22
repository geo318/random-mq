@props(['title','button','action','patch','subtitle','movie'])
<div class="max-w-[80rem] my-10 p-5 rounded-md bg-gray-100 mx-auto">
    <form class="divide-gray-200" method="POST" action="{{ $action }}">
        @csrf
        @if($patch ?? false)
            @method('PATCH')
        @endif
        <div class="divide-gray-200">
            <div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $subtitle ?? '' }}</p>
                </div>
        
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                @foreach ( array_keys(config('languages')) as $locale )
                    <div class="sm:col-span-6">
                        <div class="mt-1">
                            <label class="text-gray-800 pb-2 block" for="movie.{{ $locale }}">{{ __('main.title') }} ({{ $locale }})</label>
                            <textarea id="movie.{{ $locale }}" name="title[{{ $locale }}]" rows="2" class="text-black resize-none p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="{{ __('main.movie_title_here') }}"
                            >{{ old('title.' . $locale, isset($movie) ? $movie->getTranslations('title')[$locale] : '') }}</textarea>
                        </div>                    
                        @error('title.' . $locale)
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <div class="flex">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ $button }}
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>