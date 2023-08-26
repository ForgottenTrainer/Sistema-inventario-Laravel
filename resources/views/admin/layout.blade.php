<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Sistema de Inventario JPS</title>
        @livewireStyles
    </head>
    <body class="bg-slate-700">
        <div class="flex">
            @include('components.aside')
            <main class="flex-1 p-4">
                <div class="container">
                    <h1 class="text-center text-orange-500 font-bold mt-5 mb-5 text-4xl">
                        @yield('titulo')
                    </h1>
                    <div class="p-4 sm:ml-64">
                        @yield('contenido')
                    </div>
                </div>
            </main>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        @livewireScripts
    </body>
</html>