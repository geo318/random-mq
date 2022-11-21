<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('fonts/font.css') }}">
    <title>Movie quotes app</title>
    @vite('resources/css/app.css')
  </head>

  <body class="font-['Sansation'] bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#4E4E4E] via-[#3D3B3B] to-[#3D3B3B] h-full w-full min-h-screen text-white">
        <header class="flex fixed inset-0 h-20 z-50">
          {{ Session::get('applocale') }}
          {{ app()->getLocale() }}
          <div class="grow p-5">
          @unless (request()->routeIs('home'))
            <div class="flex">
              <a href="/{{ Session::get('applocale') ?? app()->getLocale() }}" class="text-white mr-5"><span class="text-xl">&#8249; </span>{{ __('home') }}</a>
              <a href="javascript:history.back()" class="text-white"><span class="text-xl"> </span>{{ __('back') }}</a>
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
                <button type="submit" class="{{ $class }}">{{ __('logout') }}</button>
              </form>
            @else
              <a class="{{ $class }}" href="{{ route('login',app()->getLocale()) }}">{{ __('login') }}</a>
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