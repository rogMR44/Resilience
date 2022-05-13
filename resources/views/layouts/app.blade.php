<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="/images/logos/Image.png">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>        

        <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
        <script src="\jQuery-Plugin-stringToSlug-1.3\jquery.StringToSlug.jquery.json"></script>
    
        <script src="\jQuery-Plugin-stringToSlug-1.3\jquery.stringToSlug.js"></script>
    
        <script src="\jQuery-Plugin-stringToSlug-1.3\jquery.stringToSlug.min.js"></script>

        <script src="https://js.stripe.com/v3/"></script>

        @isset($css)
            {{$css}}
        @endisset

    </head>    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-400">
            @livewire('navigation')

            <!-- Page Content -->
            <div class="bg-gray-400">
                {{ $slot }}
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
    </body>
    <footer>
        <div class="bg-black py-8 grid grid-cols-2">
            <span class="text-white font-medium ml-10">Resilience 2022</span>
            <span class="text-white font-medium mr-10 justify-self-end"><a class="hover:text-yellow-300" href="">Lorem ipsum dolor</a> | <a class="hover:text-yellow-300" href="">Adipiscing elit</a></span>
        </div>
    </footer>
</html>
