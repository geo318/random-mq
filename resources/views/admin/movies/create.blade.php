<x-layout>
    <x-admin.movies.form button="create" title="Create a new movie" :action="route('admin.movies',app()->getLocale())"/>
</x-layout>