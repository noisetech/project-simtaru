<?php

namespace App\Http\Livewire\Pages\VerifikasiLapangan;

use App\Helpers\SuratGenerator;
use App\Models\Pengajuan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class FormulirVerifikasi extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $foto_dokumentasi = [];
    public $openModalTerbitkanBeritaAcara = false;
    public $openModal = false;

    public function handleOpenModalTerbitkanBeritaAcara()
    {
        $this->openModalTerbitkanBeritaAcara = true;
    }

    public function handleCloseModalTerbitkanBeritaAcara()
    {
        $this->openModalTerbitkanBeritaAcara = false;
    }

    public function mount($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        // if ($pengajuan->status_id !== 3 && $pengajuan->status_id !== 4) {
        //     abort(404);
        // }

        $this->pengajuan_id = $id;
        $this->status_id = $pengajuan->status_id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->no_ba = $pengajuan->no_ba;
        if ($pengajuan->tanggal_peninjauan_lokasi !== null) {
            $this->tanggal_peninjauan_lokasi = $pengajuan->tanggal_peninjauan_lokasi->isoFormat('YYYY-MM-DD');
        } else {
            $this->tanggal_peninjauan_lokasi = null;
        }
        $this->desa = $pengajuan->desa;
        $this->kecamatan = $pengajuan->kecamatan;
        $this->batas_sebelah_utara = $pengajuan->batas_sebelah_utara;
        $this->batas_sebelah_timur = $pengajuan->batas_sebelah_timur;
        $this->batas_sebelah_selatan = $pengajuan->batas_sebelah_selatan;
        $this->batas_sebelah_barat = $pengajuan->batas_sebelah_barat;

        $this->penggunaan_tanah_saat_dimohon = $pengajuan->penggunaan_tanah_saat_dimohon;
        $this->topografi_tanah = $pengajuan->topografi_tanah;
        $this->rencana_penggunaan_tanah = $pengajuan->rencana_penggunaan_tanah;
        $this->kesuburan_tanah = $pengajuan->kesuburan_tanah;
        $this->sarana_irigasi_atau_sumurbor = $pengajuan->sarana_irigasi_atau_sumurbor;
        $this->jarak_bangunan_dengan_sungai = $pengajuan->jarak_bangunan_dengan_sungai;
        $this->jarak_bangunan_dengan_jalan = $pengajuan->jarak_bangunan_dengan_jalan;

        $this->status_kepemilikan = $pengajuan->status_kepemilikan;
        $this->bukti_penguasaan_tanah = $pengajuan->bukti_penguasaan_tanah;
        $this->luas_tanah_seluruhnya = $pengajuan->luas_tanah_seluruhnya;
        $this->luas_tanah_yang_dimohon = $pengajuan->luas_tanah_yang_dimohon;
        $this->luas_tanah_yang_disetujui = $pengajuan->luas_tanah_yang_disetujui;

        $this->kesesuaian_rencana = $pengajuan->kesesuaian_rencana;
        $this->hubungan_pemohon_dengan_tanah = $pengajuan->hubungan_pemohon_dengan_tanah;
        $this->kesesuaian_dengan_keadaan_fisik_tanah = $pengajuan->kesesuaian_dengan_keadaan_fisik_tanah;
        $this->tanah_yang_dimohon_fisiknya = $pengajuan->tanah_yang_dimohon_fisiknya;
        $this->jarak_dari_pemukiman_terdekat = $pengajuan->jarak_dari_pemukiman_terdekat;
        $this->pertimbangan = $pengajuan->pertimbangan;

        $this->titik_koordinat = $pengajuan->titik_koordinat;
         $this->file_dokumentasi = $pengajuan->file_dokumentasi;
         $this->luas_bangunan = $pengajuan->luas_bangunan;
         $this->kdb = $pengajuan->kdb;
         $this->klb = $pengajuan->klb;
         $this->kdh = $pengajuan->kdh;
         $this->gsb = $pengajuan->gsb;
         $this->tinggi_bangunan = $pengajuan->tinggi_bangunan;
         $this->rencana_jalan = $pengajuan->rencana_jalan;
    }

    public function rules()
    {
        return [
            'foto_dokumentasi' => [function ($attribute, $value, $fail) {
                $count = count($value);
                for ($i = 0; $i < $count; $i++) {
                    if ($value[$i]->extension() == 'png' || $value[$i]->extension() == 'jpg' || $value[$i]->extension() == 'jpeg') {
                    } else {
                        $fail('Isian gambar rencana pembangunan semuanya harus berupa file gambar');
                    }
                }
            }],
        ];
    }



    public function deleteFotoDokumentasi()
    {
        $this->foto_dokumentasi = [];
    }

    public function save()
    {
        $this->validate($this->rules());
        // dd($this);
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            // if($this->status_id == 3 && $this->status_id==4){

            // }
            $pengajuan->no_ba = $this->no_ba;
            $pengajuan->tanggal_peninjauan_lokasi = $this->tanggal_peninjauan_lokasi;
            $pengajuan->status_id = 5;
            $pengajuan->desa = $this->desa;
            $pengajuan->kecamatan = $this->kecamatan;
            $pengajuan->batas_sebelah_utara = $this->batas_sebelah_utara;
            $pengajuan->batas_sebelah_timur = $this->batas_sebelah_timur;
            $pengajuan->batas_sebelah_selatan = $this->batas_sebelah_selatan;
            $pengajuan->batas_sebelah_barat = $this->batas_sebelah_barat;

            $pengajuan->penggunaan_tanah_saat_dimohon = $this->penggunaan_tanah_saat_dimohon;
            $pengajuan->topografi_tanah = $this->topografi_tanah;
            $pengajuan->rencana_penggunaan_tanah = $this->rencana_penggunaan_tanah;
            $pengajuan->kesuburan_tanah = $this->kesuburan_tanah;
            $pengajuan->sarana_irigasi_atau_sumurbor = $this->sarana_irigasi_atau_sumurbor;
            $pengajuan->jarak_bangunan_dengan_sungai = $this->jarak_bangunan_dengan_sungai;
            $pengajuan->jarak_bangunan_dengan_jalan = $this->jarak_bangunan_dengan_jalan;

            $pengajuan->status_kepemilikan = $this->status_kepemilikan;
            $pengajuan->bukti_penguasaan_tanah = $this->bukti_penguasaan_tanah;
            $pengajuan->luas_tanah_seluruhnya = $this->luas_tanah_seluruhnya;
            $pengajuan->luas_tanah_yang_dimohon = $this->luas_tanah_yang_dimohon;
            $pengajuan->luas_tanah_yang_disetujui = $this->luas_tanah_yang_disetujui;

            $pengajuan->kesesuaian_rencana = $this->kesesuaian_rencana;
            $pengajuan->hubungan_pemohon_dengan_tanah = $this->hubungan_pemohon_dengan_tanah;
            $pengajuan->kesesuaian_dengan_keadaan_fisik_tanah = $this->kesesuaian_dengan_keadaan_fisik_tanah;
            $pengajuan->tanah_yang_dimohon_fisiknya = $this->tanah_yang_dimohon_fisiknya;
            $pengajuan->jarak_dari_pemukiman_terdekat = $this->jarak_dari_pemukiman_terdekat;
            $pengajuan->pertimbangan = $this->pertimbangan;
            $pengajuan->titik_koordinat = $this->titik_koordinat;

            $pengajuan->luas_bangunan = $this->luas_bangunan;
            $pengajuan->kdb = $this->kdb;
            $pengajuan->klb = $this->klb;
            $pengajuan->kdh = $this->kdh;
            $pengajuan->gsb = $this->gsb;
            $pengajuan->tinggi_bangunan = $this->tinggi_bangunan;
            $pengajuan->rencana_jalan = $this->rencana_jalan;


            $path = 'pengajuan/' . $this->pengajuan_id;
            if (isset($this->foto_dokumentasi)) {
                $foto_dokumentasi = [];
                for ($i = 0; $i < count($this->foto_dokumentasi); $i++) {
                    $foto_dokumentasi[$i] = $this->foto_dokumentasi[$i]->store($path);
                }
                $pengajuan->foto_dokumentasi = json_encode($foto_dokumentasi);
            }

            // dd($pengajuan);

            $pengajuan->save();

            SuratGenerator::generateBeritaAcara($this->pengajuan_id, $path);
            SuratGenerator::generateFileDokumentasi($this->pengajuan_id, $path);

            // $this->alert('success', 'Berhasil menerbitkan Berita Acara', [
            //     'timerProgressBar' => true,
            // ]);

            // $this->handleCloseModalTerbitkanBeritaAcara();
            // $this->openModal = true;
            return redirect()->route('survey.edit', ['id'=> $this->pengajuan_id]);

        } catch (\Exception $e) {
            // dd($e);
            $this->alert('success', 'Gagal, coba beberapa saat lagi', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.verifikasi-lapangan.formulir-verifikasi');
    }
}
