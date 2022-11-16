<x-layout>
    <x-admin.movies.form button="update" title="Edit movie" :movie="$movie" :action="route('admin.movies.movie',$movie)" patch/>
</x-layout>