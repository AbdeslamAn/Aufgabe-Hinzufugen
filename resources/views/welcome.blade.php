<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body class="font-sans antialiased min-h-screen grid-items-center">

            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ route('aufgabes.index') }}"
                            class="text-indigo-600 hover:text-indigo-800"
                        >
                            Noten
                        </a>
                    @else
                    <div class="absolut top-0  right-0 p-6">
                        <a
                            href="{{ route('login') }}"
                            class="text-indigo-600 hover:text-indigo-800 mr-4"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="text-indigo-600 hover:text-indigo-800">
                                Register
                            </a>
                    </div>
                        @endif
                    @endauth
                </nav>
            @endif
            <h1 class="text-7xl">Aufgabe Hinzufügen</h1>



        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
