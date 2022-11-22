<x-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center max-w-[60rem] mx-auto">
            <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-white">{{ __('main.quotes') }}</h1>
            <p class="mt-2 text-sm text-gray-100">{{ $movie->title }}</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            <a 
                href="{{ route('admin.quote.create', [app()->getLocale(),$movie->id])  }}"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
            >
                {{ __('main.add_new_quote') }}
            </a>
            </div>
        </div>
        <div class="mt-8 flex flex-col max-w-[60rem] mx-auto">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('main.title') }}</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('main.image') }}</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">{{ __('main.edit') }}</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">{{ __('main.delete') }}</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                                @foreach ($movie->quotes as $quote)

                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $quote->quote }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                            <img id='image-exists' class="object-cover w-16 h-16 rounded-md" src="{{ asset('storage/' . $quote->thumbnail) }}"/>
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="{{ route('admin.quote.edit', [app()->getLocale(), $movie->id, $quote->id]) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('main.edit') }}</a>
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <form action="{{ route('admin.quote',[app()->getLocale(), $movie->id, $quote->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-indigo-600 hover:text-indigo-900">{{ __('main.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>