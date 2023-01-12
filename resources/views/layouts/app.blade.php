<!DOCTYPE html>
<html id="html" lang="id" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title . ' | Simtaru Lampura' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=' . time()) }}">

    <!-- Quill Editor Style -->
    <link rel="stylesheet" href="{{ asset('css/quill-snow.css') }}">

    @livewireStyles

    @stack('stylesForMap')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v=' . time()) }}" defer></script>

    <!-- Style x-cloak -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* width */
        #scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        #mainScrollbar::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        #scrollbar::-webkit-scrollbar-track {
            background: #f3f4f6;
        }

        /* Handle */
        #scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db;
        }

        /* Handle on hover */
        #scrollbar::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body class="bg-gray-50">
    @livewire('layout.topbar')

    <div class="flex pt-16 overflow-hidden bg-white">
        @livewire('layout.sidebar')
        <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
        <div id="main-content"
            class="relative flex flex-col justify-between w-full min-h-screen overflow-y-auto bg-gray-50 lg:ml-72">
            <main>
                {{ $slot }}
            </main>
            <div class="px-4 pb-4">
                <p class="px-4 py-5 text-sm text-center text-gray-500 bg-white rounded-lg shadow">
                    &copy; {{ date('Y') }} <a href="https://simtaru-lampura.com"
                        class="hover:underline hover:text-primary" target="_blank">Sistem
                        Informasi Tata Ruang Kabupaten Lampung Utara</a>. All
                    rights reserved.
                </p>
            </div>
        </div>
    </div>

    @stack('scripts')


    @livewireScripts

    <!-- Scripts SweetAlert -->
    <script src="{{ asset('js/sweet-alert.js') }}"></script>
    <x-livewire-alert::scripts />
</body>

@stack('scriptsForMap')

@stack('script')

</html>
