<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="http://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        
    </body>
</html>
