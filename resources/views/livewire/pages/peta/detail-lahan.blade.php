<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 align-self-center">
                    <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                        data-wow-delay="1s">
                        <div class="row" style="margin-top: 150px;">
                            <div class="col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div id="map" style="height: 700px; width: 100%">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-start">
                                            Detail data lahan
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" cellspacing="0" width="100%">
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <td>{{ $pengajuan->nama_lengkap }}</td>
                                                </tr>


                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $pengajuan->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pekerjaan</th>
                                                    <td>{{ $pengajuan->pekerjaan }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Luas Tanah Yang Dimohon</th>
                                                    <td>{{ $pengajuan->luas_tanah_yang_dimohon }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Luas Tanah Yang Disetujui</th>
                                                    <td>{{ $pengajuan->luas_tanah_yang_disetujui }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Letak Tanah</th>
                                                    <td>{{ $pengajuan->letak_tanah }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Rencana Pengunaan Tanah</th>
                                                    <td>{{ $pengajuan->rencana_penggunaan_tanah }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Status Kepemilikan</th>
                                                    <td>{{ $pengajuan->status_kepemilikan }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Desa</th>
                                                    <td>{{ $pengajuan->desa }}</td>
                                                </tr>


                                                <tr>
                                                    <th>Kecamatan</th>
                                                    <td>{{ $pengajuan->kecamatan }}</td>
                                                </tr>



                                            </table>
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
</div>



@push('stylesForMap')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
@endpush


@push('scriptsForMap')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

    <script>
        var semua_polygon = L.layerGroup();


        var semua_kecamatan = L.layerGroup();

        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });

        var map = L.map('map', {
            center: [-4.839805523991851, 104.80661431304546],
            zoom: 11,
            layers: [peta1, semua_polygon ]
        });

        var baseLayers = {
            "Grayscale": peta1,
            "Stalite": peta2,
            "Streets": peta3,
        }

        var overlays = {
            "Polygon": semua_polygon,
        };

        @foreach ($bahan_peta as $item)
            var all_polygon = L.geoJSON(<?= $item->titik_polygon ?>, {
                style: {
                    color: 'white',
                    dashArray: '5',
                    fillColor: '<?= $item->warna ?>',
                    fillOpacity: 0.7,
                },
            }).addTo(semua_polygon);
        @endforeach

        L.control.layers(baseLayers, overlays).addTo(map);
    </script>
@endpush
