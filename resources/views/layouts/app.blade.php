<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')

    @livewireStyles
    <style>
         html {
            direction:rtl;
        }
        button {
            font-family: "CairoBold", sans-serif;
        }

        input,p {
            font-family: "CairoLight", sans-serif;
        }

        input::placeholder {
            color: rgb(255, 255, 255);
        }
    </style>


</head>

<body>





{{ $slot }}



@livewireScripts
</body>

</html>


{{-- // php artisan make:component ... --}}