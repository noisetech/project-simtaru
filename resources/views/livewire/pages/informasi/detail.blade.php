@slot('title', 'Peta')

<div class="w-full max-w-6xl mx-auto pt-28 2xl:max-w-7xl">
    <div class="flex justify-center text-3xl">
        <span class="text-4xl font-bold text-gray-600 capitalize">Data Pemanfaatan Ruang</span>
    </div>
    
    <div class="w-full max-w-6xl mx-auto mt-5 2xl:max-w-7xl" style="width:70%; ">
    <table>
             <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Nama  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $nama_lengkap }}</td>
                </tr> 
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Luas  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $luas_tanah_yang_disetujui }} m2</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Tinggi Bangunan  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $tinggi_bangunan }} m2</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Koefisien Dasar Bangunan  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $kdb }} %</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Koefisien Lantai Bangunan  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $klb }} %</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Koefisien Dasar Hijau  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $kdh }} %</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Garis Sempadan Bangunan  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $gsb }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Rencana Jalan  </span>
                        <span>:</span>
                    </td>
                    <td> {{ $rencana_jalan }}</td>
                </tr>
          </table>

        <div class="relative flex flex-col my-4 border rounded-lg shadow">
       
            <div id="viewMaps" class="w-full rounded-lg h-[100vh]" ></div>
            <div id="searchSection" class="absolute w-full justify-center items-center pt-3.5" style="display: none">
                <input id="searchName" type="text" value="" placeholder="Search by name here..."
                    onKeyDown="if(event.keyCode==13) maps()"
                    class="w-1/4 text-sm border-none shadow focus:border-none focus:ring-0">
                <button onclick="maps()"
                    class="shadow-lg border-none focus:border-none inline-flex items-center px-3 py-2.5 h-full bg-gray-400 border border-transparent text-sm text-white hover:bg-gray-600 active:bg-gray-600 tracking-wider font-medium font-mono focus:outline-none transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


</div>

@push('stylesForMap')
    <link rel="stylesheet" href="https://js.arcgis.com/4.23/esri/themes/light/main.css">
@endpush

 
@push('scriptsForMap')
    <script src="https://js.arcgis.com/4.23/"></script>

    <script>
        var pengajuan = {!! json_encode($pengajuan->toArray()) !!};

        window.onload = maps;

        function parse_gps(input) {
            if (input.indexOf('N') == -1 && input.indexOf('S') == -1 &&
                input.indexOf('W') == -1 && input.indexOf('E') == -1) {
                return input.split(',');
            }

            var parts = input.split(/[°'"]+/).join(' ').split(/[^\w\S]+/);
            var directions = [];
            var coords = [];
            var dd = 0;
            var pow = 0;

            for (i in parts) {
                // we end on a direction
                if (isNaN(parts[i])) {
                    var _float = parseFloat(parts[i]);
                    var direction = parts[i];
                    if (!isNaN(_float)) {
                        dd += (_float / Math.pow(60, pow++));
                        direction = parts[i].replace(_float, '');
                    }
                    direction = direction[0];
                    if (direction == 'S' || direction == 'W')
                        dd *= -1;
                    directions[directions.length] = direction;
                    coords[coords.length] = dd;
                    dd = pow = 0;
                } else {
                    dd += (parseFloat(parts[i]) / Math.pow(60, pow++));
                }
            }

            if (directions[0] == 'W' || directions[0] == 'E') {
                var tmp = coords[0];
                coords[0] = coords[1];
                coords[1] = tmp;
            } else {
                return coords;
            }
        }

        function maps() {
            var val = document.getElementById("searchName").value;

            require(["esri/config", "esri/Map", "esri/views/MapView", "esri/Graphic", "esri/layers/GraphicsLayer",
                "esri/widgets/BasemapToggle", "esri/widgets/BasemapGallery", "esri/widgets/Search"
            ], function(esriConfig, Map, MapView, Graphic, GraphicsLayer, BasemapToggle, BasemapGallery,
                Search) {

                esriConfig.apiKey =
                    "AAPKbe4b6be13d2b4208aa87d844238080fcAzwqJx-4YJmsIKpZ6LNCB_TiQMjElEMOgSo5rm7BcwJbOTpImhJqFBBx3lENWNZ4";

                const map = new Map({
                    basemap: "arcgis-imagery" // Basemap layer service
                });

 
                    latitude = -4.818;
                    longitude = 104.836;
                    
             
                const view = new MapView({
                    map: map,
                    center: [longitude,latitude], // Longitude, latitude
                    zoom: 11, // Zoom level
                    container: "viewMaps" // Div element
                });

                //baru
                const basemapToggle = new BasemapToggle({
                view: view,
                nextBasemap: "arcgis-imagery"
                });


                view.ui.add(basemapToggle,"bottom-right");


                //batas baru
                
                if (val.length == 0) {
                    var filteredObj = pengajuan.find(function(item, i) {
                        indices = pengajuan.reduce((r, o, i) => ((o.nama_lengkap).toLowerCase().match('') &&
                            r
                            .push(i),
                            r), []);
                    });
                } else {
                    var filteredObj = pengajuan.find(function(item, i) {
                        indices = pengajuan.reduce((r, o, i) => ((o.nama_lengkap).toLowerCase().match(
                                val) && r
                            .push(i),
                            r), []);
                    });
                }

                for (let i = 0; i < indices.length; i++) {
                    var  titikpoly= pengajuan[indices[i]].titik_polygon;
                    var titik_fix=titikpoly.replace("|", ",");
                   
                    var arrayz = JSON.parse("[" + titik_fix + "]");
                  

                    titikKoordinat = pengajuan[indices[i]].titik_polygon;
                    latitude = parseFloat(parse_gps(titikKoordinat)[0]);
                    longitude = parseFloat(parse_gps(titikKoordinat)[1]);

                    const graphicsLayer = new GraphicsLayer();
                    map.add(graphicsLayer);

                    const polygon = {
                        type: "polygon",
                        rings: arrayz
                    };

                    const simpleFillSymbol = {
                        type: "simple-fill",
                        color: [227, 139, 79, 0.8],  // Orange, opacity 80%
                        outline: {
                            color: [255, 255, 255],
                            width: 1
                        }
                    };

                    


                    const popupTemplate = {
                        title: "{Name}",
                        content: "<table style='border-collapse: collapse;'>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB; border-top: 1px solid #E5E7EB;'><td style='width: 40%; vertical-align: top'><strong>Letak Tanah</strong></td><td style='padding:5px 0 5px 0;'>{LetakTanah}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Penggunaan Tanah</strong></td><td style='padding:5px 0 5px 0;'>{PenggunaanTanah}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Titik Koordinat</strong></td><td style='padding:5px 0 5px 0;'>{TitikKoordinat}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Luas Tanah</strong></td><td style='padding:5px 0 5px 0;'>{LuasTanah}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Batas Utara</strong></td><td style='padding:5px 0 5px 0;'>{BatasUtara}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Batas Timur</strong></td><td style='padding:5px 0 5px 0;'>{BatasTimur}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Batas Selatan</strong></td><td style='padding:5px 0 5px 0;'>{BatasSelatan}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Batas Barat</strong></td><td style='padding:5px 0 5px 0;'>{BatasBarat}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Topografi Tanah</strong></td><td style='padding:5px 0 5px 0;'>{TopografiTanah}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Kesuburan</strong></td><td style='padding:5px 0 5px 0;'>{Kesuburan}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Irigasi/Sumur Bor</strong></td><td style='padding:5px 0 5px 0;'>{IrigasiSumurBor}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Jarak dengan Sungai</strong></td><td style='padding:5px 0 5px 0;'>{JarakSungai}</td></tr>" +
                            "<tr style='border-bottom: 1px solid #E5E7EB;'><td><strong>Jarak dengan Jalan</strong></td><td style='padding:5px 0 5px 0;'>{JarakBangunanJalan}</td></tr>" +
                            "</table>"
                    };

                    const attributes = {
                        Name: pengajuan[indices[i]].nama_lengkap,
                        LetakTanah: pengajuan[indices[i]].letak_tanah,
                        PenggunaanTanah: pengajuan[indices[i]].rencana_penggunaan_tanah,
                        LuasTanah: pengajuan[indices[i]].luas_tanah_yang_disetujui + ' m<sup>2</sup>',
                        BatasUtara: pengajuan[indices[i]].batas_sebelah_utara,
                        BatasTimur: pengajuan[indices[i]].batas_sebelah_timur,
                        BatasSelatan: pengajuan[indices[i]].batas_sebelah_selatan,
                        BatasBarat: pengajuan[indices[i]].batas_sebelah_barat,
                        TopografiTanah: pengajuan[indices[i]].topografi_tanah,
                        Kesuburan: pengajuan[indices[i]].kesuburan_tanah,
                        IrigasiSumurBor: pengajuan[indices[i]].sarana_irigasi_atau_sumurbor,
                        JarakSungai: pengajuan[indices[i]].jarak_bangunan_dengan_sungai + ' m',
                        JarakBangunanJalan: pengajuan[indices[i]].jarak_bangunan_dengan_jalan + ' m',
                        TitikKoordinat: pengajuan[indices[i]].titik_koordinat,
                    };

                    const polygonGraphic = new Graphic({
                        geometry: polygon,
                        symbol: simpleFillSymbol,
                        attributes: attributes,
                        popupTemplate: popupTemplate

                    });
                    graphicsLayer.add(polygonGraphic);



                }
            });
        }

        let searchSection = document.getElementById('searchSection');
        searchSection.style.display = 'flex';
    </script>

<script>


   

@endpush
