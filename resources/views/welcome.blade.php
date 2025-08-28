<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            @if (Route::has('login'))
                <div class="absolute top-0 right-0 p-6 text-end">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-ghost">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ghost">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-ghost">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="hero">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">Welcome to Laravel</h1>
                        <p class="py-6">Laravel authentication scaffolding with Blade, Tailwind (v4) and DaisyUI (v5).</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
