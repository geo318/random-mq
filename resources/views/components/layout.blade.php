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
        
        <div class="flex justify-end p-5 text-sm">
          @auth
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="px-10 py-2 rounded-md border border-gray-300">logout</button>
            </form>
          @else
            <a class="px-10 py-2 rounded-md border border-gray-300" href="{{ route('login') }}">login</a>
          @endauth
        </div>
        
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