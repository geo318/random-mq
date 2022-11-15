<x-layout>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center max-w-[50rem] mx-auto">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-white">Movies</h1>
        <p class="mt-2 text-sm text-gray-100">A list of all the movies in your account</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

        <a 
          href="{{ route('admin.movies.create') }}" 
          class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
        >
          Add movie
        </a>
      </div>
    </div>
    <div class="mt-8 flex flex-col max-w-[50rem] mx-auto">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quotes</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Add quote</span>
                  </th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">delete</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($movies as $movie)
                
                  <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                      <a href="{{ route('admin.movies.movie', $movie->slug) }}" class="text-indigo-600 hover:text-indigo-900">{{ $movie->title }}<span class="sr-only"></span></a>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ count($movie->quotes) ?? 0 }}</td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                      <a 
                        href="{{ route('admin.quote.create', $movie->id)  }}" 
                        class="inline-flex items-center justify-center rounded-md border ring-1 px-4 py-2 text-sm font-medium text-black shadow-sm focus:outline-none focus:ring-2 hover:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                      >
                        Add new quote
                      </a>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                      <a href="{{ route('admin.movies.edit', $movie->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                      <form method="POST" action="{{ route('admin.movies.movie', $movie->id) }}">
                        @csrf
                        @method('delete')
                        <button class="text-indigo-600 hover:text-indigo-900">Delete</button>
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