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
        <x-sidebar/>
        {{ $slot }}
  </body>
</html>