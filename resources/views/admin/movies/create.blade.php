<x-layout>
    <x-admin.movies.form button="{{ __('create') }}" title="{{ __('Create a new movie') }}" :action="route('admin.movies',app()->getLocale())"/>
</x-layout>