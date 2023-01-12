<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="antialiased">
    <div class="relative flex justify-center min-h-screen items-center sm:pt-0">
        <div class="sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center">
                <div class="flex flex-col items-center">
                    <h1 class="font-bold text-primary text-7xl md:text-9xl">
                        @yield('code')
                    </h1>
                    <h6 class="mb-2 text-xl font-medium md:font-bold text-center text-gray-800 md:text-3xl">
                        @yield('message')
                    </h6>
                </div>
                <div class="mt-2 md:mt-5 flex justify-center">
                    <a href="/" class="text-primary underline font-medium">Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
