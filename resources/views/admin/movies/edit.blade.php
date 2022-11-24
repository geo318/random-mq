<x-layout>
    <x-admin.movies.form button="{{ __('main.update') }}" title="{{ __('main.edit_movie') }}" :movie="$movie" :action="route('admin.movies.movie',$movie)" patch/>
</x-layout>