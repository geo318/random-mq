<x-layout>
    <x-admin.movies.form button="{{ __('update') }}" title="{{ __('Edit movie') }}" :movie="$movie" :action="route('admin.movies.movie',[app()->getLocale(), $movie])" patch/>
</x-layout>