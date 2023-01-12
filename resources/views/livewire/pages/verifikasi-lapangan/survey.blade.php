<html>

<head>
    <meta charset="utf-8" />
    <title>Edit Polygon</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=' . time()) }}">

    <!-- Quill Editor Style -->
    <link rel="stylesheet" href="{{ asset('css/quill-snow.css') }}">

    @livewireStyles

    @stack('stylesForMap')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v=' . time()) }}" defer></script>

    @livewireStyles


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@^3.0.9/dist/esri-leaflet.js"></script>

    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.0/dist/esri-leaflet-vector.js" crossorigin=""></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css"
        crossorigin="" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" crossorigin=""></script>

    <style>
        html,
        body,
        #map {
            padding: 0;
            margin: 0;
            height: 45vh;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #323232;
        }

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

                <div class="px-4 py-3">
                    <div class="py-4 px-0 md:px-16 md:py-6 my-4 bg-white border rounded-lg shadow">
                        <div id="map">

                        </div>
                    </div>
                </div>


                <div class="px-4 py-3">
                    <div class="py-4 px-4 md:px-16 md:py-6 my-4 bg-white border rounded-lg shadow">
                        <label class="input-label text-center text-xl font-medium rounded-lg mb-4 mt-2">
                            {{ $status_id === 4 ? 'Revisi' : '' }}
                            Pendataan Titik Polygon Area Pemanfaatan Ruang
                            {{ $nama_lengkap }}</label>
                        <form action="{{ route('survey.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input name="pengajuan_id" value="{{ $pengajuan_id }}" type="hidden" class="input"
                                required>


                            <div class="mb-6">
                                <label class="input-label"> titik polygon <span
                                        class="font-bold text-danger">*</span></label>

                                <textarea  name="titik_polygon" type="text" id="titik_polygon" class="input" required
                                    cols="30" rows="10">{{ $titik_polygon }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label class="input-label">Jenis Tanah<span
                                        class="font-bold text-danger">*</span></label>
                                <select name="jenis_tanah_id" class="input">
                                   @foreach ($jenis_tanah as $jenis_tanah)
                                   <option value="{{ $jenis_tanah->id }}">{{ $jenis_tanah->jenis_tanah }}</option>
                                   @endforeach
                                </select>
                            </div>


                            <div class="text-center">
                                <button type="submit" t class="btn-primary">Selesai </button>
                            </div>
                        </form>
                    </div>
                </div>




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


    <script>
        const apiKey =
            "AAPK1e870c268e2549f284f11ae14cf4f6c39YnxtIdbL45x_N4e7A7C0TIHJhrC31ZvWAuFRffOZ1QNe7gtwAzifmZ9JFvujd03";





        const map = L.map('map', {
            center: [-4.839805523991851, 104.80661431304546],
            zoom: 12,
        });


        L.esri.Vector.vectorBasemapLayer("ArcGIS:Imagery", {
            // provide either apikey or token
            apikey: apiKey
        }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            draw: {
                polygon: true,
                marker: false,
                circle: false,
                circlemarker: false,
                rectangle: false,
                polyline: false,
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function(event) {
            var layer = event.layer;
            var feature = layer.feature == layer.feature || {};
            feature.type = feature.type || "Feature";
            var props = feature.properties = feature.properties || {};
            drawnItems.addLayer(layer);
            $("[name=titik_polygon]").val(JSON.stringify(drawnItems.toGeoJSON()));
        });

        map.on('draw:edited', function(e) {
            $("[name=titik_polygon]").val(JSON.stringify(drawnItems.toGeoJSON()));
        })

        map.on('draw:deleted', function(e) {
            $("[name=titik_polygon]").val(JSON.stringify(drawnItems.toGeoJSON()));
        })
    </script>
</body>

</html>
