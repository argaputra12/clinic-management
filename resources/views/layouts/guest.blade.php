<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Aliyah Medika</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('storage/icon/ALIYAH_medika.png') }}" type="image/png" sizes="32x32">

  <!-- Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Styles -->
  @if (Route::currentRouteName() == 'login' ||
          Route::currentRouteName() == 'register' ||
          Route::currentRouteName() == 'password.request' ||
          Route::currentRouteName() == 'password.reset')
    <style>
      [x-cloak] {
        display: none;
      }

      body {
        background-image: url("{{ asset('storage/icon/background.jpeg') }}");
      }
    </style>
  @else
    <style>
      [x-cloak] {
        display: none;
      }
      body{
        background-color: #105652;
      }
    </style>
  @endif

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/0b736e1e36.js" crossorigin="anonymous"></script>

  <!-- Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>
  <div class="flex flex-col min-h-screen text-gray-900 dark:bg-dark-eval-0 dark:text-gray-200">
    {{ $slot }}

    <x-footer />
  </div>
</body>

</html>
