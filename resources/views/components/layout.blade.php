<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}?v=2">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}?v=2">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}?v=2" color="#5bbad5">
    <link rel="stylesheet" href="{{ asset('fonts/font.css') }}">
    <title>Movie quotes app</title>
    @vite('resources/css/app.css')
  </head>

  <body class="font-['Sansation'] bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#4E4E4E] via-[#3D3B3B] to-[#3D3B3B] h-full w-full min-h-screen text-white">
        <header class="flex fixed inset-0 h-20 z-50">
          <div class="grow p-5">
          @unless (request()->routeIs('home'))
            <div class="flex">
              <a href="{{ route('home') }}" class="text-white mr-5"><span class="text-xl">&#8249; </span>{{ __('main.home') }}</a>
              <a href="javascript:history.back()" class="text-white"><span class="text-xl"> </span>{{ __('main.back') }}</a>
            </div>
            
          @endif
          </div>
          @php
            $class = 'px-10 py-2 rounded-md border bg-indigo-600 border-transparent text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'
          @endphp

          <div class="flex justify-end p-5 text-sm">
            @auth
              <form action="{{ route('logout', app()->getLocale()) }}" method="POST">
                @csrf
                <button type="submit" class="{{ $class }}">{{ __('main.logout') }}</button>
              </form>
            @else
              <a class="{{ $class }}" href="{{ route('login') }}">{{ __('main.login') }}</a>
            @endauth
          </div>
        </header>
        
        <x-sidebar/>
        <main class="flex flex-col justify-center  min-h-screen">
          {{ $slot }}
        </main>
        @if(Session::has('success'))
          <x-flash name="success"/>
        @elseif(Session::has('fail'))
          <x-flash name="fail"/>
        @endif
  </body>
</html>