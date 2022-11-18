<aside class="fixed top-0 h-screen flex flex-col justify-center items-center w-[10.25rem] shrink-0">
    @foreach (config('languages') as $key => $value)
        <x-lang :link=" route('lang.switch', $key) " class="mb-3 {{ app()->currentLocale() === $key ? 'bg-white text-black' : '' }}">{{ $key }}</x-lang>
    @endforeach
</aside>