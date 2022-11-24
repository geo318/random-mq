@props(['title','button','subtitle','patch','action','quote'])
<x-layout>  
    <div class="max-w-[80rem] my-10 p-5 rounded-md bg-gray-100 mx-auto min-w-[30rem]">
        <form enctype="multipart/form-data" method="POST" action="{{ $action }}" class="space-y-8 divide-y divide-gray-200">
            <div>
                @csrf
                @if($patch ?? false)
                    @method('PATCH')
                @endif
                <div>
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                    </div>
            
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                        @foreach ( array_keys(config('languages')) as $locale )
                            <div class="sm:col-span-6">
                                <label for="quote.{{ $locale }}" class="block text-sm font-medium text-gray-700">{{ __('main.quote') }} ({{ $locale }})</label>
                                <div class="mt-1">
                                    <textarea id="quote.{{ $locale }}" name="quote[{{ $locale }}]" rows="3" class="text-black block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    >{{ old('quote.' . $locale, isset($quote)? $quote->getTranslations('quote')[$locale] : '') }}</textarea>
                                </div>
                                @error('quote.' . $locale)
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                
                            </div>
                        @endforeach                     
                
                        <div class="sm:col-span-6">
                            <label for="cover-photo" class="block text-sm font-medium text-gray-700">{{ __('main.quote_photo') }}</label>
                            <x-image-uploader thumbnail="{{ isset($quote) ? $quote->thumbnail : '' }}"/>
                        </div>
                    </div>
                </div>
            
                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ $button }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>