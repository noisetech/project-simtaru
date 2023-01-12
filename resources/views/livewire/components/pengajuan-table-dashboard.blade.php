<tbody x-data={open:false}>
    <tr class="border-b">
        <x-livewire-tables::table.cell class="text-center md:px-0">
            <button x-cloak x-show="!open" x-on:click="open=true">
                @include('components.icon-uncollapse-table')
            </button>
            <button x-cloak x-show="open" x-on:click="open=false">
                @include('components.icon-collapse-table')
            </button>
        </x-livewire-tables::table.cell>
        <x-livewire-tables::table.cell class="font-semibold">
            {{ $row->nama_lengkap }}
        </x-livewire-tables::table.cell>
        <x-livewire-tables::table.cell class="font-semibold">
            {{ Carbon\Carbon::parse($row->created_at)->isoFormat('D MMMM Y') }}
        </x-livewire-tables::table.cell>
        <x-livewire-tables::table.cell class="font-semibold">
            {{ $row->rencana_penggunaan_tanah }}
        </x-livewire-tables::table.cell>
        <x-livewire-tables::table.cell class="font-semibold">
            @if ($row->status_id == 1)
                <span class="badge-danger">
                    {{ $row->jenis_status }}
                </span>
            @else
                <span class="badge-success">
                    {{ $row->jenis_status }}
                </span>
            @endif
        </x-livewire-tables::table.cell>
        @if ($status_id == 14)
            <x-livewire-tables::table.cell class="text-center">
                {{-- ubah status pengajuan --}}
                @can('ubah-status-pengajuan')
                    <button wire:click="ubahStatusPengajuan({{ $row->id }})" class="btn-warning-small">
                        Ubah status
                    </button>
                @endcan
            </x-livewire-tables::table.cell>
        @elseif ($status_id != 0 && $row->status_id != 1 && $status_id != 14)
             <x-livewire-tables::table.cell class="text-center">
                {{-- revisi berkas berita acara --}}
                @if ($row->status_id === 4)
                    @can('revisi-berkas')
                        <a href="{{ url('verifikasi-lapangan', $row->id) }}" class="btn-warning-small">
                            Revisi
                        </a>
                    @endcan
                @endif
                {{-- revisi berkas nota dinas --}}
                @if ($row->status_id === 7)
                    @can('revisi-berkas')
                        <button wire:click="revisiNotaDinas({{ $row->id }})" class="btn-warning-small">
                            Revisi
                        </button>
                    @endcan
                @endif
                {{-- revisi berkas surat rekomendasi --}}
                @if ($row->status_id === 9)
                    @can('revisi-berkas')
                        <button wire:click="revisiSuratRekomendasi({{ $row->id }})" class="btn-warning-small">
                            Revisi
                        </button>
                    @endcan
                @endif
                {{-- verifikasi berkas --}}
                @if ($row->status_id === 2)
                    @can('verifikasi-berkas')
                        <button wire:click="tolakVerifikasiBerkas({{ $row->id }})" class="mr-1 btn-danger-small">
                            Tolak
                        </button>
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                            Edit
                        </a>
                        <button wire:click="setujuVerifikasiBerkas({{ $row->id }})" class="btn-primary-small">
                            Setujui
                        </button>

                    @endcan
                @endif
                {{-- verifikasi lapangan --}}
                @if ($row->status_id === 3)
                    @can('verifikasi-lapangan')
                        @can('kelola-admin')
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                                Edit
                            </a>
                        @endcan

                        <button wire:click="tolakVerifikasiLapangan({{ $row->id }})" class="mr-1 btn-danger-small">
                            Tolak
                        </button>
                        <a href="{{ url('verifikasi-lapangan', $row->id) }}" class="btn-primary-small">
                            Setujui 
                        </a>

                          <a href="{{ route('survey.edit',$row->id) }}" class="btn-warning-small">
                               <i class="mdi mdi-pencil"></i> Rekam Polygon  </a> 
                    @endcan
                @endif
                {{-- penerbitan surat --}}
                @if ($row->status_id === 5)
                        @can('kelola-admin')
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                                Edit
                            </a>
                        @endcan
                    @can('penerbitan-surat')
                        <button wire:click="revisiPenerbitanSurat({{ $row->id }})" class="mr-1 btn-danger-small">
                            Revisi
                        </button>
                        <button wire:click="setujuPenerbitanSurat({{ $row->id }})" class="btn-primary-small">
                            Setujui
                        </button>
                    @endcan
                @endif
                {{-- persetujuan ketua tkprd --}}
                @if ($row->status_id === 6)
                       @can('kelola-admin')
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                                Edit
                            </a>
                        @endcan
                    @can('persetujuan-tkprd')
                        <button wire:click="revisiPersetujuanKetuaTKPRD({{ $row->id }})"
                            class="mr-1 btn-danger-small">
                            Revisi
                        </button>
                        <button wire:click="setujuPersetujuanKetuaTKPRD({{ $row->id }})" class="btn-primary-small">
                            Setujui
                        </button>
                    @endcan
                @endif
                {{-- persetujuan kadis pupr --}}
                @if ($row->status_id === 8)
                      @can('kelola-admin')
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                                Edit
                            </a>
                        @endcan
                    @can('persetujuan-pupr')
                        <button wire:click="tolakPersetujuanKadisPUPR({{ $row->id }})" class="mr-1 btn-danger-small">
                            Tolak
                        </button>
                        <button wire:click="revisiPersetujuanKadisPUPR({{ $row->id }})"
                            class="mr-1 btn-warning-small">
                            Revisi
                        </button>
                        <button wire:click="setujuPersetujuanKadisPUPR({{ $row->id }})" class="btn-primary-small">
                            Setujui
                        </button>
                    @endcan
                @endif
                {{-- penomoran surat --}}
                @if ($row->status_id === 10) 
                       @can('kelola-admin')
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                                Edit
                            </a>
                        @endcan
                    @can('penomoran-surat')
                        <button wire:click="beriNomorSuratDanTanggal({{ $row->id }})" class="btn-primary-small">
                            Beri nomor surat dan tanggal
                        </button>
                    @endcan
                @endif
                {{-- upload scan surat rekomendasi --}}
                @if ($row->status_id === 11)
                      @can('kelola-admin')
                        <a href="{{ url('verifikasi-berkas', $row->id) }}" class="mr-1 btn-warning-small">
                                Edit
                            </a>
                        @endcan
                    @can('upload-scan-surat-rekomendasi')
                        <button wire:click="uploadScanSuratRekomendasi({{ $row->id }})" class="btn-primary-small">
                            Upload surat
                        </button>
                    @endcan
                @endif

                {{-- rekam polygon--}}
                @if ($row->status_id === 13 || $row->status_id === 14 || $row->status_id === 11 || $row->status_id === 12)
                     
                      @can('verifikasi-lapangan')
                    <a href="{{ route('survey.edit',$row->id) }}" class="btn-warning-small">
                               <i class="mdi mdi-pencil"></i> Edit Polygon  </a> 

                    <a href="{{ url('verifikasi-lapangan', $row->id) }}" class="btn-primary-small">
                            Edit Data Lapangan 
                        </a>
                    @endcan
                @endif

 
            </x-livewire-tables::table.cell>
        @endif
    </tr>
    <tr x-cloak x-show="open">
        <x-livewire-tables::table.cell class="w-1/2 font-semibold align-top border-r" colspan="4"
            style="white-space: normal;">
            <table class="align-top">
                @if ($status_id === 1)
                    <tr class="py-1 text-danger">
                        <td class="flex justify-between font-bold align-top">
                            <span>Alasan Ditolak</span>
                            <span>:</span>
                        </td>
                        <td class="underline"> {{ $row->alasan_ditolak }}</td>
                    </tr>
                @endif
                @if ($status_id === 4 || $status_id === 7 || $status_id === 9)
                    <tr class="py-1 text-warning">
                        <td class="flex justify-between font-bold align-top">
                            <span>Revisi</span>
                            <span>:</span>
                        </td>
                        <td class="underline"> {{ $row->revisi_berkas }}</td>
                    </tr>
                @endif
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Nama Lengkap</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->nama_lengkap }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>No Identitas</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->no_identitas }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Alamat</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->alamat }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Tempat Tanggal Lahir</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->tempat_tanggal_lahir }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Pekerjaan</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->pekerjaan }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>No HP</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->no_hp }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Bertindak Atas Nama</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->bertindak_atas_nama }} </td>
                </tr>
                <tr class="py-1">
                    <td class="font-bold align-top whitespace-nowrap">
                        <span>Penggunaan Tanah Saat Dimohon</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->penggunaan_tanah_saat_dimohon }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Luas Tanah Seluruhnya</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->luas_tanah_seluruhnya }} m<sup>2</sup></td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Luas Tanah Yang Dimohon</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->luas_tanah_yang_dimohon }} m<sup>2</sup></td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Bukti Penguasaan Tanah</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->bukti_penguasaan_tanah }} </td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Letak Tanah</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->letak_tanah }} </td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Rencana Penggunaan Tanah</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->rencana_penggunaan_tanah }} </td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Batas Sebelah Utara</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->batas_sebelah_utara }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Batas Sebelah Timur</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->batas_sebelah_timur }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Batas Sebelah Selatan</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->batas_sebelah_selatan }} </td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Batas Sebelah Barat</span>
                        <span>:</span>
                    </td>
                    <td> {{ $row->batas_sebelah_barat }}</td>
                </tr>
                <tr class="py-1">
                    <td class="flex justify-between font-bold align-top">
                        <span>Titik Koordinat</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->titik_koordinat)
                            <a href="https://www.google.co.id/maps/search/{{ $row->titik_koordinat }}"
                                target="_blank" class="btn-primary-small">
                                Lihat lokasi
                            </a>
                            <br>
                            {{ $row->titik_koordinat }}
                        @else
                            <button class="btn-secondary-disabled">
                                Lihat lokasi
                            </button>
                            Belum ada
                        @endif
                    </td>
                </tr>
            </table>
        </x-livewire-tables::table.cell>
        <x-livewire-tables::table.cell class="font-semibold align-top" colspan="2" style="white-space: normal;">
            <table>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Fotocopy KTP</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->fotocopy_ktp != null)
                            <a href="{{ url('fotocopy-ktp', $row->id) }}" target="_blank" class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif
                        @can('kelola-admin')
                                <button wire:click="uploadKTP({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusKTP({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Fotocopy Sertifikat</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->fotocopy_sertifikat != null)
                            <a href="{{ url('fotocopy-sertifikat', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif
                        @can('kelola-admin')
                                <button wire:click="uploadSertifikat({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusSertifikat({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Fotocopy SPPT PBB</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->fotocopy_sppt_pbb != null)
                            <a href="{{ url('fotocopy-sppt-pbb', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif

                        @can('kelola-admin')
                                <button wire:click="uploadSPPT({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusSPPT({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Fotocopy NPWP</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->fotocopy_npwp != null)
                            <a href="{{ url('fotocopy-npwp', $row->id) }}" target="_blank" class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif

                        @can('kelola-admin')
                                <button wire:click="uploadNPWP({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusNPWP({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Surat Persetujuan Tetangga</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->surat_persetujuan_tetangga != null)
                            <a href="{{ url('surat-persetujuan-tetangga', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif

                        @can('kelola-admin')
                                <button wire:click="uploadSTetangga({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusSTetangga({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Gambar Rencana Pembangunan</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->gambar_rencana_pembangunan != null)
                            <?php
                            $gambars = json_decode($row->gambar_rencana_pembangunan);
                            $no = 1;
                            ?>
                            <div class="flex flex-col py-1 space-y-1.5">
                                @foreach ($gambars as $gambar)
                                    <a href="{{ url('gambar-rencana-pembangunan', [$row->id, $no]) }}"
                                        target="_blank" class="btn-primary-small">
                                        Gambar {{ $no }}
                                    </a>

                                    <?php
                                    $no++;
                                    ?>
                                @endforeach
                            </div>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak ada
                            </button>
                        @endif

                        @can('kelola-admin')
                                <button wire:click="uploadRencana({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusRencana({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top whitespace-nowrap">
                        <span>Fotocopy Akte Pendirian Perusahaan</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->fotocopy_akte_pendirian_perusahaan != null)
                            <a href="{{ url('fotocopy-akte-pendirian-perusahaan', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif
                        @can('kelola-admin')
                                <button wire:click="uploadAkte({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusAkte({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Set Lokasi Bangunan</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->set_lokasi_bangunan != null)
                            <a href="{{ url('set-lokasi-bangunan', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif
                          @can('kelola-admin')
                                <button wire:click="uploadLokasi({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusLokasi({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Surat Pernyataan Force Majeur</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->surat_pernyataan_force_majeur != null)
                            <a href="{{ url('surat-pernyataan-force-majeur', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif

                        @can('kelola-admin')
                                <button wire:click="uploadForce({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusForce({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Proposal</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->proposal != null)
                            <a href="{{ url('proposal', $row->id) }}" target="_blank" class="btn-primary-small">
                                Lihat
                            </a>
                        @else
                            <button class="btn-secondary-disabled">
                                Tidak Ada
                            </button>
                        @endif

                        @can('kelola-admin')
                                <button wire:click="uploadProposal({{ $row->id }})" class="btn-warning-small">
                                Edit 
                                </button>
                                <button wire:click="hapusProposal({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Surat Pernyataan</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->surat_pernyataan != null)
                            <a href="{{ url('surat-pernyataan', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                            <button wire:click="hapusSuratPernyataan({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                        @elseif($row->id <= 244)
                            <button wire:click="generateSuratPernyataan({{ $row->id }})"
                                class="btn-primary-small">
                                Generate
                            </button>
                        @endif
                        
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Surat Permohonan SKPR</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->surat_permohonan_skpr != null)
                            <a href="{{ url('surat-permohonan-skpr', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                            <button wire:click="hapusSKPR({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                        @elseif($row->id <= 244)
                            <button wire:click="generateSuratPermohonanSKPR({{ $row->id }})"
                                class="btn-primary-small">
                                Generate
                            </button>
                        @endif
                    </td>
                    </td>
                </tr>
                <tr>
                    <td class="flex justify-between py-1 font-bold align-top">
                        <span>Surat Permohonan TKPRD</span>
                        <span>:</span>
                    </td>
                    <td>
                        @if ($row->surat_permohonan_tkprd != null)
                            <a href="{{ url('surat-permohonan-tkprd', $row->id) }}" target="_blank"
                                class="btn-primary-small">
                                Lihat
                            </a>
                            <button wire:click="hapusTKPRD({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                        @elseif($row->id <= 244)
                            <button wire:click="generateSuratPermohonanTKPRD({{ $row->id }})"
                                class="btn-primary-small">
                                Generate
                            </button>
                        @endif
                    </td>
                </tr>
                @if ($row->status_id !== 1 && $row->status_id !== 2)
                    <tr>
                        <td class="flex justify-between py-1 font-bold align-top">
                            <span>Berita Acara</span>
                            <span>:</span>
                        </td>
                        <td>
                            @if ($row->berita_acara != null)
                                <a href="{{ url('berita-acara', $row->id) }}" target="_blank"
                                    class="btn-primary-small">
                                    Lihat
                                </a>
                            @elseif($row->id <= 244)
                                <button wire:click="generateBeritaAcara({{ $row->id }})"
                                    class="btn-primary-small">
                                    Generate
                                </button>
                            @else
                                <button class="btn-secondary-disabled">
                                    Tidak Ada
                                </button>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="flex justify-between py-1 font-bold align-top">
                            <span>Dokumentasi</span>
                            <span>:</span>
                        </td>
                        <td>
                            @if ($row->file_dokumentasi != null)
                                <a href="{{ url('dokumentasi', $row->id) }}" target="_blank"
                                    class="btn-primary-small">
                                    Lihat
                                </a>
                            @elseif($row->id <= 244)
                                <button wire:click="generateDokumentasi({{ $row->id }})"
                                    class="btn-primary-small">
                                    Generate
                                </button>
                            @else
                                <button class="btn-secondary-disabled">
                                    Tidak Ada
                                </button>
                            @endif
                        </td>
                    </tr>
                @endif
                @if ($row->status_id !== 1 && $row->status_id !== 2 && $row->status_id !== 3 && $row->status_id !== 5)
                    <tr>
                        <td class="flex justify-between py-1 font-bold align-top">
                            <span>Nota Dinas</span>
                            <span>:</span>
                        </td>
                        <td>
                            @if ($row->nota_dinas != null)
                                <a href="{{ url('nota-dinas', $row->id) }}" target="_blank"
                                    class="btn-primary-small">
                                    Lihat
                                </a>
                            @elseif($row->id <= 244)
                                <button wire:click="generateNotaDinas({{ $row->id }})" class="btn-primary-small">
                                    Generate
                                </button>
                            @else
                                <button class="btn-secondary-disabled">
                                    Tidak Ada
                                </button>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="flex justify-between py-1 font-bold align-top">
                            <span>Surat Hasil Rekomendasi</span>
                            <span>:</span>
                        </td>
                        <td>
                            @if (isset($row->surat_hasil_rekomendasi))
                                <a href="{{ url('surat-hasil-rekomendasi', $row->id) }}" target="_blank"
                                    class="btn-primary-small">
                                    Lihat
                                </a>
                                <button wire:click="hapusRekom({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                            @elseif($row->id <= 244)
                                <button wire:click="generateSuratRekomendasi({{ $row->id }})"
                                    class="btn-primary-small">
                                    Generate
                                </button>
                            @else
                                <button class="btn-secondary-disabled">
                                    Tidak Ada
                                </button>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="flex justify-between py-1 font-bold align-top">
                            <span>Scan Surat Hasil Rekomendasi</span>
                            <span>:</span>
                        </td>
                        <td>
                            @if (isset($row->scan_surat_hasil_rekomendasi))
                                <a href="{{ url('scan-surat-hasil-rekomendasi', $row->id) }}" target="_blank"
                                    class="btn-primary-small">
                                    Lihat
                                </a>
                            @else
                                <button class="btn-secondary-disabled">
                                    Tidak Ada
                                </button>
                            @endif
                            @can('kelola-admin')
                                <button wire:click="uploadScanSuratRekomendasi({{ $row->id }})" class="btn-warning-small">
                                Upload 
                                </button>
                                <button wire:click="hapusScanSuratRekomendasi({{ $row->id }})" class="btn-danger-small">
                                Hapus 
                                </button>
                             @endcan
                        </td>
                    </tr>
                @endif
            </table>




            @if ($openModalUploadScanSuratRekomendasi)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalUploadScanSuratRekomendasi" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Upload scan surat hasil rekomendasi yang sudah ditandatangani atas nama pengajuan <span
                                    class="font-bold">{{ $nama_lengkap }}</span>.
                            </h3>
                            <form wire:submit.prevent="uploadScanSuratRekomendasi2">
                                <div class="flex flex-col">
                                    <label class="text-left input-label">Scan Surat Hasil Rekomendasi</label>
                                    <input wire:model="scan_surat_hasil_rekomendasi" type="file" class="input-file"
                                        required>
                                    @error('scan_surat_hasil_rekomendasi')
                                        <span class="text-left validation-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button wire:click="handleCloseModalUploadScanSuratRekomendasi" type="button"
                                    class="mt-5 mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-primary">
                                    Ya
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif



            <!-- hapus scan surat  -->
            @if ($openModalHapusScanSuratRekomendasi)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusScanSuratRekomendasi" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus berkas scan hasil rekomendasi atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusScanSuratRekomendasi" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasScan" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif



            <!-- hapus   KTP  -->
            @if ($openModalHapusKTP)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusKTP" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file KTP atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusKTP" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasKTP" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        

<!-- edit KTP -->
        @if ($openModalUploadKTP)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalUploadKTP" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Upload File Fc KTP atas nama pengajuan <span
                                    class="font-bold">{{ $nama_lengkap }}</span>.
                            </h3>
                            <form wire:submit.prevent="uploadKTP2">
                                <div class="flex flex-col">
                                    <label class="text-left input-label">Fc KTP</label>
                                    <input wire:model="fotocopy_ktp" type="file" class="input-file"
                                        required>
                                    @error('fotocopy_ktp')
                                        <span class="text-left validation-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button wire:click="handleCloseModalUploadKTP" type="button"
                                    class="mt-5 mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-primary">
                                    Ya
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($openModalUploadSPPT)
<div class="modal-wrapper">
    <div class="modal-layout">
        <div class="modal">
            <div class="modal-header">
                <button wire:click="handleCloseModalUploadSPPT" type="button"
                    class="modal-close-button">
                    @include('components.icon-x-close-modal')
                </button>
            </div>
            <div class="modal-body">
                @include('components.icon-warning-modal')
                <h3 class="modal-text">
                    Upload File Fc SPPT atas nama pengajuan <span
                        class="font-bold">{{ $nama_lengkap }}</span>.
                </h3>
                <form wire:submit.prevent="uploadSPPT2">
                    <div class="flex flex-col">
                        <label class="text-left input-label">Fc SPPT</label>
                        <input wire:model="fotocopy_sppt_pbb" type="file" class="input-file"
                            required>
                        @error('fotocopy_SPPT')
                            <span class="text-left validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button wire:click="handleCloseModalUploadSPPT" type="button"
                        class="mt-5 mr-3 btn-secondary">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- hapus   SPPT  -->
    @if ($openModalHapusSPPT)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusSPPT" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file SPPT atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusSPPT" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasSPPT" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif



        @if ($openModalUploadNPWP)
<div class="modal-wrapper">
    <div class="modal-layout">
        <div class="modal">
            <div class="modal-header">
                <button wire:click="handleCloseModalUploadNPWP" type="button"
                    class="modal-close-button">
                    @include('components.icon-x-close-modal')
                </button>
            </div>
            <div class="modal-body">
                @include('components.icon-warning-modal')
                <h3 class="modal-text">
                    Upload File Fc NPWP atas nama pengajuan <span
                        class="font-bold">{{ $nama_lengkap }}</span>.
                </h3>
                <form wire:submit.prevent="uploadNPWP2">
                    <div class="flex flex-col">
                        <label class="text-left input-label">Fc NPWP</label>
                        <input wire:model="fotocopy_npwp" type="file" class="input-file"
                            required>
                        @error('fotocopy_NPWP')
                            <span class="text-left validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button wire:click="handleCloseModalUploadNPWP" type="button"
                        class="mt-5 mr-3 btn-secondary">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- hapus   NPWP  -->
    @if ($openModalHapusNPWP)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusNPWP" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file NPWP atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusNPWP" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasNPWP" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($openModalUploadLokasi)
<div class="modal-wrapper">
    <div class="modal-layout">
        <div class="modal">
            <div class="modal-header">
                <button wire:click="handleCloseModalUploadLokasi" type="button"
                    class="modal-close-button">
                    @include('components.icon-x-close-modal')
                </button>
            </div>
            <div class="modal-body">
                @include('components.icon-warning-modal')
                <h3 class="modal-text">
                    Upload File Fc Lokasi atas nama pengajuan <span
                        class="font-bold">{{ $nama_lengkap }}</span>.
                </h3>
                <form wire:submit.prevent="uploadLokasi2">
                    <div class="flex flex-col">
                        <label class="text-left input-label">Set Lokasi Bangunan</label>
                        <input wire:model="set_lokasi_bangunan" type="file" class="input-file"
                            required>
                        @error('fotocopy_Lokasi')
                            <span class="text-left validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button wire:click="handleCloseModalUploadLokasi" type="button"
                        class="mt-5 mr-3 btn-secondary">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- hapus   Lokasi  -->
    @if ($openModalHapusLokasi)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusLokasi" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file Set Lokasi Bangunan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusLokasi" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasLokasi" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($openModalUploadRencana)
<div class="modal-wrapper">
    <div class="modal-layout">
        <div class="modal">
            <div class="modal-header">
                <button wire:click="handleCloseModalUploadRencana" type="button"
                    class="modal-close-button">
                    @include('components.icon-x-close-modal')
                </button>
            </div>
            <div class="modal-body">
                @include('components.icon-warning-modal')
                <h3 class="modal-text">
                    Upload File Fc Rencana atas nama pengajuan <span
                        class="font-bold">{{ $nama_lengkap }}</span>.
                </h3>
                <form wire:submit.prevent="uploadRencana2">
                    <div class="flex flex-col">
                        <label class="text-left input-label">Gambar Rencana Bangunan</label>
                        <input wire:model="gambar_rencana_pembangunan" type="file" class="input-file" multiple
                            required>
                        @error('fotocopy_Rencana')
                            <span class="text-left validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button wire:click="handleCloseModalUploadRencana" type="button"
                        class="mt-5 mr-3 btn-secondary">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- hapus   Rencana  -->
    @if ($openModalHapusRencana)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusRencana" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file Gambar Rencana Bangunan atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusRencana" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasRencana" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif



        <!-- edit sertifikat -->
                @if ($openModalUploadSertifikat)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="handleCloseModalUploadSertifikat" type="button"
                            class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-warning-modal')
                        <h3 class="modal-text">
                            Upload File Fc Sertifikat atas nama pengajuan <span
                                class="font-bold">{{ $nama_lengkap }}</span>.
                        </h3>
                        <form wire:submit.prevent="uploadSertifikat2">
                            <div class="flex flex-col">
                                <label class="text-left input-label">Fc Sertifikat</label>
                                <input wire:model="fotocopy_sertifikat" type="file" class="input-file"
                                    required>
                                @error('fotocopy_sertifikat')
                                    <span class="text-left validation-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <button wire:click="handleCloseModalUploadSertifikat" type="button"
                                class="mt-5 mr-3 btn-secondary">
                                Batal
                            </button>
                            <button type="submit" class="btn-primary">
                                Ya
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

            <!-- hapus   Sertifikat  -->
            @if ($openModalHapusSertifikat)
                    <div class="modal-wrapper">
                        <div class="modal-layout">
                            <div class="modal">
                                <div class="modal-header">
                                    <button wire:click="handleCloseModalHapusSertifikat" type="button"
                                        class="modal-close-button">
                                        @include('components.icon-x-close-modal')
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('components.icon-warning-modal')
                                    <h3 class="modal-text">
                                        Anda yakin ingin menghapus file Sertifikat atas nama <span
                                            class="font-bold">{{ $nama_lengkap }}</span>?
                                    </h3>
                                    <button wire:click="handleCloseModalHapusSertifikat" type="button"
                                        class="mr-3 btn-secondary">
                                        Batal
                                    </button>
                                    <button wire:click="HapusBerkasSertifikat" type="button" class="btn-primary">
                                        Ya
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif




                <!-- edit Force -->
@if ($openModalUploadForce)
<div class="modal-wrapper">
<div class="modal-layout">
<div class="modal">
    <div class="modal-header">
        <button wire:click="handleCloseModalUploadForce" type="button"
            class="modal-close-button">
            @include('components.icon-x-close-modal')
        </button>
    </div>
    <div class="modal-body">
        @include('components.icon-warning-modal')
        <h3 class="modal-text">
            Upload File Fc Force atas nama pengajuan <span
                class="font-bold">{{ $nama_lengkap }}</span>.
        </h3>
        <form wire:submit.prevent="uploadForce2">
            <div class="flex flex-col">
                <label class="text-left input-label"> Force majeur</label>
                <input wire:model="surat_pernyataan_force_majeur" type="file" class="input-file"
                    required>
                @error('fotocopy_Force')
                    <span class="text-left validation-error">{{ $message }}</span>
                @enderror
            </div>

            <button wire:click="handleCloseModalUploadForce" type="button"
                class="mt-5 mr-3 btn-secondary">
                Batal
            </button>
            <button type="submit" class="btn-primary">
                Ya
            </button>
        </form>
    </div>
</div>
</div>
</div>
@endif

<!-- hapus   Force  -->
@if ($openModalHapusForce)
    <div class="modal-wrapper">
        <div class="modal-layout">
            <div class="modal">
                <div class="modal-header">
                    <button wire:click="handleCloseModalHapusForce" type="button"
                        class="modal-close-button">
                        @include('components.icon-x-close-modal')
                    </button>
                </div>
                <div class="modal-body">
                    @include('components.icon-warning-modal')
                    <h3 class="modal-text">
                        Anda yakin ingin menghapus file Force atas nama <span
                            class="font-bold">{{ $nama_lengkap }}</span>?
                    </h3>
                    <button wire:click="handleCloseModalHapusForce" type="button"
                        class="mr-3 btn-secondary">
                        Batal
                    </button>
                    <button wire:click="HapusBerkasForce" type="button" class="btn-primary">
                        Ya
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif




    <!-- edit Proposal -->
@if ($openModalUploadProposal)
<div class="modal-wrapper">
<div class="modal-layout">
<div class="modal">
    <div class="modal-header">
        <button wire:click="handleCloseModalUploadProposal" type="button"
            class="modal-close-button">
            @include('components.icon-x-close-modal')
        </button>
    </div>
    <div class="modal-body">
        @include('components.icon-warning-modal')
        <h3 class="modal-text">
            Upload File Fc Proposal atas nama pengajuan <span
                class="font-bold">{{ $nama_lengkap }}</span>.
        </h3>
        <form wire:submit.prevent="uploadProposal2">
            <div class="flex flex-col">
                <label class="text-left input-label"> Proposal</label>
                <input wire:model="proposal" type="file" class="input-file"
                    required>
                @error('fotocopy_Proposal')
                    <span class="text-left validation-error">{{ $message }}</span>
                @enderror
            </div>

            <button wire:click="handleCloseModalUploadProposal" type="button"
                class="mt-5 mr-3 btn-secondary">
                Batal
            </button>
            <button type="submit" class="btn-primary">
                Ya
            </button>
        </form>
    </div>
</div>
</div>
</div>
@endif

<!-- hapus   Proposal  -->
@if ($openModalHapusProposal)
    <div class="modal-wrapper">
        <div class="modal-layout">
            <div class="modal">
                <div class="modal-header">
                    <button wire:click="handleCloseModalHapusProposal" type="button"
                        class="modal-close-button">
                        @include('components.icon-x-close-modal')
                    </button>
                </div>
                <div class="modal-body">
                    @include('components.icon-warning-modal')
                    <h3 class="modal-text">
                        Anda yakin ingin menghapus file Proposal atas nama <span
                            class="font-bold">{{ $nama_lengkap }}</span>?
                    </h3>
                    <button wire:click="handleCloseModalHapusProposal" type="button"
                        class="mr-3 btn-secondary">
                        Batal
                    </button>
                    <button wire:click="HapusBerkasProposal" type="button" class="btn-primary">
                        Ya
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif



                @if ($openModalUploadSTetangga)
<div class="modal-wrapper">
    <div class="modal-layout">
        <div class="modal">
            <div class="modal-header">
                <button wire:click="handleCloseModalUploadSTetangga" type="button"
                    class="modal-close-button">
                    @include('components.icon-x-close-modal')
                </button>
            </div>
            <div class="modal-body">
                @include('components.icon-warning-modal')
                <h3 class="modal-text">
                    Upload File Fc STetangga atas nama pengajuan <span
                        class="font-bold">{{ $nama_lengkap }}</span>.
                </h3>
                <form wire:submit.prevent="uploadSTetangga2">
                    <div class="flex flex-col">
                        <label class="text-left input-label">File surat persetujuan tetangga</label>
                        <input wire:model="surat_persetujuan_tetangga" type="file" class="input-file"
                            required>
                        @error('fotocopy_STetangga')
                            <span class="text-left validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button wire:click="handleCloseModalUploadSTetangga" type="button"
                        class="mt-5 mr-3 btn-secondary">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- hapus   STetangga  -->
    @if ($openModalHapusSTetangga)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusSTetangga" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file Surat persetujuan Tetangga atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusSTetangga" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasSTetangga" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif



        @if ($openModalUploadAkte)
<div class="modal-wrapper">
    <div class="modal-layout">
        <div class="modal">
            <div class="modal-header">
                <button wire:click="handleCloseModalUploadAkte" type="button"
                    class="modal-close-button">
                    @include('components.icon-x-close-modal')
                </button>
            </div>
            <div class="modal-body">
                @include('components.icon-warning-modal')
                <h3 class="modal-text">
                    Upload File Fc Akte atas nama pengajuan <span
                        class="font-bold">{{ $nama_lengkap }}</span>.
                </h3>
                <form wire:submit.prevent="uploadAkte2">
                    <div class="flex flex-col">
                        <label class="text-left input-label">Fc Akte</label>
                        <input wire:model="fotocopy_akte_pendirian_perusahaan" type="file" class="input-file"
                            required>
                        @error('fotocopy_Akte')
                            <span class="text-left validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button wire:click="handleCloseModalUploadAkte" type="button"
                        class="mt-5 mr-3 btn-secondary">
                        Batal
                    </button>
                    <button type="submit" class="btn-primary">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- hapus   Akte  -->
    @if ($openModalHapusAkte)
            <div class="modal-wrapper">
                <div class="modal-layout">
                    <div class="modal">
                        <div class="modal-header">
                            <button wire:click="handleCloseModalHapusAkte" type="button"
                                class="modal-close-button">
                                @include('components.icon-x-close-modal')
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.icon-warning-modal')
                            <h3 class="modal-text">
                                Anda yakin ingin menghapus file Akte atas nama <span
                                    class="font-bold">{{ $nama_lengkap }}</span>?
                            </h3>
                            <button wire:click="handleCloseModalHapusAkte" type="button"
                                class="mr-3 btn-secondary">
                                Batal
                            </button>
                            <button wire:click="HapusBerkasAkte" type="button" class="btn-primary">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

            
           </x-livewire-tables::table.cell>
    </tr>
</tbody>
