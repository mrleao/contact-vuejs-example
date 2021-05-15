<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eSocial') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{('css/custom.css')}}">
     
     <!-- Scripts --> 
     <script src="{{ mix('js/app.js') }}" defer></script>

  </head>
  <body>
    <div class="text-center">
        <h3>Você acaba de receber um novo contato!</h3>
        Verifique se novo contato <a href="http://localhost/lista-contatos">aqui</a>
    </div>
  
  </body>
</html>