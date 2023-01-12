<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title . ' | Simtaru' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=' . time()) }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v=' . time()) }}" defer></script>
</head>

<body class="bg-gray-50">
    <main class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 pt-6 mx-auto md:h-screen">
            <a href="/" class="flex items-center justify-center mb-5 text-2xl font-semibold lg:mb-8">
                <img src="{{ asset('img/logo/logo-lampura.png') }}" alt="" class="h-10 sm:h-12 md:h-14">
                <img src="{{ asset('img/logo/logo-title.png') }}" alt="" class="h-8 ml-2 sm:h-10 md:h-12">
            </a>
            <div class="w-full py-10 bg-white rounded-lg shadow md:mt-0 sm:max-w-lg">
                <div class="px-12 space-y-5 sm:py-5 lg:py-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
</body>

</html>
