<style>
    .leaflet-popup-content {
        width: 600px !important;
    }
</style>


<div class="wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 align-self-center">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                            <div class="row" style="margin-top: 150px;">
                                <div class="col-lg-12">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="">Upload file shp</label>
                                            <input type="file" class="form-control my-2">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 align-self-center">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                            <div class="row" style="margin-top: 60px;">
                                <div class="col-lg-12">
                                    <div id="map" style="height: 1000px; width: 100%">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
            zoom: 10.5,
            layers: [gray, bagian_pola_ruang]
        });



        var baseLayers = {
            "Default": gray,
        }



        const overlays = {
            "Kecamatan": bagian_kecamatan,
            "Pola Ruang": bagian_pola_ruang,
            "Polygon Semua Lahan": semua_polygon,
        };

        L.control.layers(baseLayers, overlays).addTo(map);

        @foreach ($pengajuan as $item)
            var all_polygon = L.geoJSON(<?= $item->titik_polygon ?>, {
                style: {
                    color: 'white',
                    dashArray: '5',
                    fillColor: '<?= $item->warna ?>',
                    fillOpacity: 1.0,
                },
            }).addTo(semua_polygon);

            all_polygon.eachLayer(function(layer) {
                layer.bindPopup("Data Informasi Pola Ruang" + "<br>" + "<br>" + "Kesuburan Tanah :" +
                    "<?= $item->kesuburan_tanah ?>" + "<br>" +
                    "Tanggal Peninjauan Lokasi: " +
                    "<?= \Carbon\Carbon::parse($item->tanggal_peninjauan_lokasi)->isoFormat('d-MM-Y') ?>" +
                    "<br>" +
                    "Tanggal Turun Nota Dinas: " +
                    "<?= \Carbon\Carbon::parse($item->tanggal_turun_nota_dinas)->isoFormat('d-MM-Y') ?>" +
                    "<br>" + "Jenis tanah: " + "<?= ucfirst($item->jenis_tanah) ?>" + "<br> <br>" + "<center>" +
                    "<a class='btn btn-sm btn-primary text-white' href='{{ route('detail-peta', $item->id) }}'>" +
                    "Detail data" +
                    "</a>" + "<center>");
            });
        @endforeach





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
