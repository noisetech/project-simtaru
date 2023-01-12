@slot('title', 'Dashboard')

<style>
    .leaflet-popup-content {
        width: 600px !important;
    }
</style>

<div class="px-4 pt-3">
    <div class="grid w-full grid-cols-1 gap-4 mt-4 md:grid-cols-2 xl:grid-cols-4">
        <a href="{{ url('seluruh-pengajuan') }}">
            <div class="p-4 bg-white rounded-lg shadow sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{ JumlahNotif::seluruhPengajuan() }}</span>
                        <h3 class="text-base font-normal text-secondary"> Total Pengajuan</h3>
                    </div>
                    <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-white">
                        <div class="p-3 rounded-full bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ url('surat-rekomendasi') }}">
            <div class="p-4 bg-white rounded-lg shadow sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{ JumlahNotif::suratRekomendasi() }}</span>
                        <h3 class="text-base font-normal text-secondary">Pengajuan Disetujui</h3>
                    </div>
                    <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-white">
                        <div class="p-2 rounded-full bg-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path
                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <div class="p-4 bg-white rounded-lg shadow sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span
                        class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{ JumlahNotif::pengajuanDiproses() }}</span>
                    <h3 class="text-base font-normal text-secondary">Pengajuan Diproses</h3>
                </div>
                <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-white">
                    <div class="p-3 rounded-full bg-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-hourglass-split" viewBox="0 0 16 16">
                            <path
                                d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ url('pengajuan-ditolak') }}">
            <div class="p-4 bg-white rounded-lg shadow sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{ JumlahNotif::pengajuanDitolak() }}</span>
                        <h3 class="text-base font-normal text-secondary">Pengajuan Ditolak</h3>
                    </div>
                    <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-white">
                        <div class="p-2 rounded-full bg-danger">
                            <svg width="30" height="30" viewBox="0 0 16 16" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" class="bi bi-x">
                                <path
                                    d="M4.73171 4.35256C4.64675 4.38782 4.56957 4.43947 4.50458 4.50458L4.50476 5.4956L7.0101 8L4.50461 10.5046L4.50458 10.5046C4.43952 10.5696 4.38791 10.6469 4.3527 10.7319C4.31749 10.8169 4.29937 10.908 4.29937 11C4.29937 11.092 4.31749 11.1831 4.3527 11.2681C4.38791 11.3531 4.43952 11.4304 4.50458 11.4954C4.56964 11.5605 4.64687 11.6121 4.73188 11.6473C4.81689 11.6825 4.90799 11.7006 5 11.7006C5.09201 11.7006 5.18311 11.6825 5.26812 11.6473C5.35313 11.6121 5.43036 11.5605 5.49542 11.4954L5.49545 11.4954L8 8.9899L10.5046 11.4954L10.5046 11.4954C10.5696 11.5605 10.6469 11.6121 10.7319 11.6473C10.8169 11.6825 10.908 11.7006 11 11.7006C11.092 11.7006 11.1831 11.6825 11.2681 11.6473C11.3531 11.6121 11.4304 11.5605 11.4954 11.4954C11.5605 11.4304 11.6121 11.3531 11.6473 11.2681C11.6825 11.1831 11.7006 11.092 11.7006 11C11.7006 10.908 11.6825 10.8169 11.6473 10.7319C11.6121 10.6469 11.5605 10.5696 11.4954 10.5046L11.4954 10.5046L8.9899 8L11.4954 5.49545L11.4954 5.49542C11.5605 5.43036 11.6121 5.35313 11.6473 5.26812C11.6825 5.18311 11.7006 5.09201 11.7006 5C11.7006 4.90799 11.6825 4.81689 11.6473 4.73188C11.6121 4.64687 11.5605 4.56964 11.4954 4.50458C11.4304 4.43952 11.3531 4.38791 11.2681 4.3527C11.1831 4.31749 11.092 4.29937 11 4.29937C10.908 4.29937 10.8169 4.31749 10.7319 4.3527C10.6469 4.38791 10.5696 4.43952 10.5046 4.50458L10.5046 4.50461L8 7.0101L5.4956 4.50476L5.354 4.646L5.49545 4.50461L5.49553 4.50468C5.43052 4.43953 5.3533 4.38784 5.26829 4.35256C5.18324 4.31727 5.09207 4.29911 5 4.29911C4.90793 4.29911 4.81676 4.31727 4.73171 4.35256Z"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.4" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </a>

    {{-- <div class="relative flex flex-col my-4 border rounded-lg shadow">
        <div id="viewMaps" class="w-full rounded-lg h-[100vh]"></div>
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
    </div> --}}
</div>


<div class="px-4 px-3">


    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                        data-wow-delay="1s">
                        <div class="row" style="margin-top: 60px;">
                            <div class="col-lg-12">
                                <div id="map" style="height: 500px; width: 100%">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="px-5 pt-3">
    <div class="grid w-full grid-cols-12 gap-2 mt-4 md:grid-cols-6 xl:grid-cols-6">
        <div id="container_bulan" class="my-2">

        </div>
    </div>

</div>

<div class="px-5 pt-3 mb-5">
    <div class="grid w-full grid-cols-12 gap-2 mt-4 md:grid-cols-6 xl:grid-cols-6">
        <div id="container_tahun" class="my-2">

        </div>
    </div>

</div>

@push('stylesForMap')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
@endpush


@push('scriptsForMap')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>

    <script src="{{ asset('js/catiline.js') }}"></script>
    <script src="{{ asset('js/leaflet.shpfile.js') }}"></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@^3.0.9/dist/esri-leaflet.js"></script>

    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.0/dist/esri-leaflet-vector.js" crossorigin=""></script>

    <script>
        const apiKey =
            "AAPK1e870c268e2549f284f11ae14cf4f6c39YnxtIdbL45x_N4e7A7C0TIHJhrC31ZvWAuFRffOZ1QNe7gtwAzifmZ9JFvujd03";

        const gray = L.esri.Vector.vectorBasemapLayer("ArcGIS:Navigation", {
            apiKey
        });

        var semua_polygon = L.layerGroup();

        var bagian_pola_ruang = L.layerGroup();

        var bagian_kecamatan = L.layerGroup();



        const map = L.map('map', {
            center: [-4.839805523991851, 104.80661431304546],
            zoom: 9,
            layers: [gray, bagian_pola_ruang]
        });



        var baseLayers = {
            "Default": gray,
        }

        const overlays = {
            "Kecamatan": bagian_kecamatan,
            "Pola Ruang": bagian_pola_ruang
        };




        L.control.layers(baseLayers, overlays).addTo(map);



        var shp_kecamatan = new L.Shapefile('{{ asset('bahan-map/kecamatan.zip') }}', {
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    layer.bindPopup(Object.keys(feature.properties).map(function(k) {
                        console.log(feature.properties.KECAMATAN);

                        switch (feature.properties.KECAMATAN) {
                            case 'ABUNG BARAT':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#285430',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'ABUNG KUNANG':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#F5EA5A',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'ABUNG PEKURUN':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#39B5E0',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'ABUNG SELATAN':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#939B62',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'ABUNG SEMULI':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#FF7B54',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'ABUNG SURAKARTA':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#3C79F5',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'ABUNG TENGAH':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#7B2869',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'ABUNG TIMUR':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#009EFF',
                                    fillOpacity: 0.5,
                                })
                                break;


                            case 'ABUNG TINGGI':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#DC0000',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'BLAMBANGAN PAGAR':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#E8F3D6',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'BUKIT KEMUNING':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#10A19D',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'BUNGA MAYANG':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#2D033B',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'TANJUNG RAJA':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#3C2A21',
                                    fillOpacity: 0.5,
                                })
                                break;


                            case 'KOTABUMI SELATAN':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#E98EAD',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'SUNGKAI UTARA':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#E98EAD',
                                    fillOpacity: 0.5,
                                })
                                break;


                            case 'MUARA SUNGKAI':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#181D31',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'KOTABUMI UTARA':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#FF6E31',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'KOTABUMI':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#39B5E0',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'SUNGKAI SELATAN':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#ADE792',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'SUNGKAI BARAT':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#BAD7E9',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'SUNGKAI JAYA':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#850000',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'SUNGKAI TENGAH':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#0014FF',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'HULU SUNGKAI':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#0E5E6F',
                                    fillOpacity: 0.5,
                                })
                                break;



                            default:
                                break;
                        }

                        return k + ": " + feature.properties[k];
                    }).join("<br />"), {
                        maxHeight: 200
                    });
                }
            }
        });

        shp_kecamatan.addTo(bagian_kecamatan);
        shp_kecamatan.once("data:loaded", function() {
            console.log("berhasil membaca zip shp pola_ruang");
        });



        var shp_pola_ruang = new L.Shapefile('{{ asset('bahan-map/pola_ruang.zip') }}', {
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    layer.bindPopup(Object.keys(feature.properties).map(function(k) {
                        // console.log(feature.properties.NAMOBJ);
                        switch (feature.properties.NAMOBJ) {
                            case 'Hutan Lindung Reg. 24 Bukit Punggur':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#285430'
                                })
                                break;
                            case 'Hutan Lindung Reg.34 tangkit Tebak':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#285430',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'Hutan Produksi':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#3C2317',
                                    fillOpacity: 0.5,
                                })
                                break;

                            case 'Pertanian Tanaman Pangan':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#F0FF42',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'Permukiman':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#153462',
                                    fillOpacity: 0.5,
                                })
                                break;
                            case 'Perkebunan':
                                layer.setStyle({
                                    color: 'grey',
                                    fillColor: '#ADE792',
                                    fillOpacity: 0.5,
                                })
                                break;

                            default:
                                break;
                        }
                        return k + ": " + feature.properties[k];
                    }).join("<br />"), {
                        maxHeight: 200
                    });
                }
            }
        });

        shp_pola_ruang.addTo(bagian_pola_ruang);
        shp_pola_ruang.once("data:loaded", function() {
            console.log("berhasil membaca zip shp pola_ruang");
        });
    </script>
@endpush




// @push('script')
    //
    <script src="https://code.highcharts.com/highcharts.js"></script>
    //
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    //
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    //
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    //
    <script type="text/javascript">
        var data_total_pengajuan_per_bulan = <?php echo json_encode($data_total_pengajuan_per_bulan); ?>;
        var data_bulan = <?php echo json_encode($data_bulan); ?>;


        var data_total_pengajuan_per_tahun = <?php echo json_encode($data_total_pengajuan_per_tahun); ?>;
        var data_tahun = <?php echo json_encode($data_tahun); ?>;

        console.log(data_bulan);

        Highcharts.chart('container_bulan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Statistik Jumlah Pengajuan Pengajuan Perbulan'
            },
            xAxis: {
                categories: data_bulan,
                crosshair: true,
                allowDecimals: false,
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Data Pengajuan Perbulan',
                data: data_total_pengajuan_per_bulan,

            }, ]
        });



        Highcharts.chart('container_tahun', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'Grafik Statistik Jumlah Pengajuan Pengajuan Pertahun'
            },
            xAxis: {
                categories: data_tahun,
                crosshair: true,
                allowDecimals: false,
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Data Pengajuan Pertahun',
                data: data_total_pengajuan_per_tahun,
                color: 'tomato'
            }, ]
        });
    </script>
@endpush
