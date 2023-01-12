<?php

namespace App\Http\Livewire\Pages\Pengajuan;

use App\Helpers\SuratGenerator;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class FormulirPengajuan extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $nama_lengkap;
    public $tempat_tanggal_lahir;
    public $alamat;
    public $pekerjaan;
    public $no_identitas;
    public $no_hp;
    public $bertindak_atas_nama;
    public $penggunaan_tanah_saat_dimohon;

    public $luas_tanah_seluruhnya;
    public $luas_tanah_yang_dimohon;
    public $bukti_penguasaan_tanah;
    public $letak_tanah;
    public $rencana_penggunaan_tanah;
    public $batas_sebelah_utara;
    public $batas_sebelah_timur;
    public $batas_sebelah_selatan;
    public $batas_sebelah_barat;
    public $titik_koordinat;
    public $titik_polygon;

    public $fotocopy_ktp;
    public $fotocopy_sertifikat;
    public $fotocopy_sppt_pbb;
    public $fotocopy_npwp;
    public $surat_persetujuan_tetangga;
    public $gambar_rencana_pembangunan = [];
    public $fotocopy_akte_pendirian_perusahaan;
    public $set_lokasi_bangunan;
    public $surat_pernyataan_force_majeur;
    public $proposal;

    public $status_id;
    public $pengajuan_id;

    public $openModalSuccess = false;

    public function mount()
    {
        if ($this->pengajuan_id) {
            $pengajuan = Pengajuan::find($this->pengajuan_id);

            $this->status_id = $pengajuan->status_id;
            $this->nama_lengkap = $pengajuan->nama_lengkap;
            $this->tempat_tanggal_lahir = $pengajuan->tempat_tanggal_lahir;
            $this->alamat = $pengajuan->alamat;
            $this->pekerjaan = $pengajuan->pekerjaan;
            $this->no_identitas = $pengajuan->no_identitas;
            $this->no_hp = $pengajuan->no_hp;
            $this->bertindak_atas_nama = $pengajuan->bertindak_atas_nama;
            $this->penggunaan_tanah_saat_dimohon = $pengajuan->penggunaan_tanah_saat_dimohon;

            $this->luas_tanah_seluruhnya = $pengajuan->luas_tanah_seluruhnya;
            $this->luas_tanah_yang_dimohon = $pengajuan->luas_tanah_yang_dimohon;
            $this->bukti_penguasaan_tanah = $pengajuan->bukti_penguasaan_tanah;
            $this->letak_tanah = $pengajuan->letak_tanah;
            $this->rencana_penggunaan_tanah = $pengajuan->rencana_penggunaan_tanah;
            $this->batas_sebelah_utara = $pengajuan->batas_sebelah_utara;
            $this->batas_sebelah_timur = $pengajuan->batas_sebelah_timur;
            $this->batas_sebelah_selatan = $pengajuan->batas_sebelah_selatan;
            $this->batas_sebelah_barat = $pengajuan->batas_sebelah_barat;
            $this->titik_koordinat = $pengajuan->titik_koordinat;
            $this->titik_polygon = $pengajuan->titik_polygon;
        }


    }

    public function rules()
    {
        return [
            'nama_lengkap' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'no_identitas' => 'required|numeric|digits:16',
            'no_hp' => 'required|numeric',
            'bertindak_atas_nama' => 'required',
            'penggunaan_tanah_saat_dimohon' => 'required',

            'luas_tanah_seluruhnya' => 'required',
            'luas_tanah_yang_dimohon' => 'required',
            'bukti_penguasaan_tanah' => 'required',
            'letak_tanah' => 'required',
            'rencana_penggunaan_tanah' => 'required',
            'batas_sebelah_utara' => 'required',
            'batas_sebelah_timur' => 'required',
            'batas_sebelah_selatan' => 'required',
            'batas_sebelah_barat' => 'required',

            'fotocopy_ktp' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'fotocopy_sertifikat' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'fotocopy_sppt_pbb' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'fotocopy_npwp' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'surat_persetujuan_tetangga' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'gambar_rencana_pembangunan' => ['nullable', function ($attribute, $value, $fail) {
                $count = count($value);
                for ($i = 0; $i < $count; $i++) {
                    if ($value[$i]->extension() == 'png' || $value[$i]->extension() == 'jpg' || $value[$i]->extension() == 'jpeg') {
                    } else {
                        $fail('Isian gambar rencana pembangunan semuanya harus berupa file gambar');
                    }
                }
            }],

            'fotocopy_akte_pendirian_perusahaan' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'set_lokasi_bangunan' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'surat_pernyataan_force_majeur' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
            'proposal' => 'nullable|mimes:jpg,jpeg,png,pdf,docx,docx,doc',
        ];
    }

    public function deleteFile($name)
    {
        $this->$name = null;
    }

    public function save()
    {
        $this->validate(
            $this->rules()
        );

        if (Auth::check() && Auth::user()->roles->first()->name === 'Pemohon') {
            $user_id = Auth::user()->id;
        } else {
            $user_id = null;
        }
        try {
            if ($this->pengajuan_id == null) {
                $pengajuan = new Pengajuan();
            } else {
                $pengajuan = Pengajuan::find($this->pengajuan_id);
            }
            $pengajuan->user_id = $user_id;
            if ($this->pengajuan_id == null) {
                $pengajuan->status_id = 2; }
            else{
                $pengajuan->status_id = $pengajuan->status_id;
            }
            $pengajuan->nama_lengkap = $this->nama_lengkap;
            $pengajuan->tempat_tanggal_lahir = $this->tempat_tanggal_lahir;
            $pengajuan->alamat = $this->alamat;
            $pengajuan->pekerjaan = $this->pekerjaan;
            $pengajuan->no_identitas = $this->no_identitas;
            $pengajuan->no_hp = $this->no_hp;
            $pengajuan->bertindak_atas_nama = $this->bertindak_atas_nama;
            $pengajuan->penggunaan_tanah_saat_dimohon = $this->penggunaan_tanah_saat_dimohon;

            $pengajuan->luas_tanah_seluruhnya = $this->luas_tanah_seluruhnya;
            $pengajuan->luas_tanah_yang_dimohon = $this->luas_tanah_yang_dimohon;
            $pengajuan->bukti_penguasaan_tanah = $this->bukti_penguasaan_tanah;
            $pengajuan->letak_tanah = $this->letak_tanah;
            $pengajuan->rencana_penggunaan_tanah = $this->rencana_penggunaan_tanah;
            $pengajuan->batas_sebelah_utara = $this->batas_sebelah_utara;
            $pengajuan->batas_sebelah_timur = $this->batas_sebelah_timur;
            $pengajuan->batas_sebelah_selatan = $this->batas_sebelah_selatan;;
            $pengajuan->batas_sebelah_barat = $this->batas_sebelah_barat;
            $pengajuan->titik_koordinat = $this->titik_koordinat;
            // $pengajuan->titik_polygon = $this->titik_polygon;

            // if ($this->titik_koordinat != null) {
            //     $pengajuan->titik_koordinat = $this->titik_koordinat;
            // }

            $pengajuan->save();
            $id = $pengajuan->id;



            $path = 'pengajuan/' . $id;
            // required file
            if ($this->fotocopy_ktp != null) {
                $pengajuan->fotocopy_ktp = $this->fotocopy_ktp->store($path);
            }
            if ($this->fotocopy_sertifikat != null) {
                $pengajuan->fotocopy_sertifikat = $this->fotocopy_sertifikat->store($path);
            }
            if ($this->fotocopy_sppt_pbb != null) {
                $pengajuan->fotocopy_sppt_pbb = $this->fotocopy_sppt_pbb->store($path);
            }
            if ($this->fotocopy_npwp != null) {
                $pengajuan->fotocopy_npwp = $this->fotocopy_npwp->store($path);
            }
            if ($this->surat_persetujuan_tetangga != null) {
                $pengajuan->surat_persetujuan_tetangga = $this->surat_persetujuan_tetangga->store($path);
            }
            if ($this->gambar_rencana_pembangunan != null) {
                $gambar_rencana_pembangunan = [];
                for ($i = 0; $i < count($this->gambar_rencana_pembangunan); $i++) {
                    $gambar_rencana_pembangunan[$i] = $this->gambar_rencana_pembangunan[$i]->store($path);
                }
                $pengajuan->gambar_rencana_pembangunan = json_encode($gambar_rencana_pembangunan);
            }

            // optional file
            if ($this->fotocopy_akte_pendirian_perusahaan != null) {
                $pengajuan->fotocopy_akte_pendirian_perusahaan = $this->fotocopy_akte_pendirian_perusahaan->store($path);
            }
            if ($this->set_lokasi_bangunan != null) {
                $pengajuan->set_lokasi_bangunan = $this->set_lokasi_bangunan->store($path);
            }
            if ($this->surat_pernyataan_force_majeur != null) {
                $pengajuan->surat_pernyataan_force_majeur = $this->surat_pernyataan_force_majeur->store($path);
            }
            if ($this->proposal != null) {
                $pengajuan->proposal = $this->proposal->store($path);
            }

            $pengajuan->update();

            SuratGenerator::generateSuratPernyataan($id, $path);
            SuratGenerator::generateSuratPermohonanSKPR($id, $path);
            SuratGenerator::generateSuratPermohonanTKPRD($id, $path);

            $pengajuan->update();

            if ($this->pengajuan_id == null) {
                $this->alert('success', 'Berhasil mengirim berkas', [
                    'timerProgressBar' => true,
                ]);
            } else {
                $this->openModalSuccess = true;
                $this->alert('success', 'Berhasil mengubah berkas', [
                    'timerProgressBar' => true,
                ]);
            }

            if ($this->pengajuan_id == null) {
                redirect('/pengajuan');
            }
        } catch (\Exception $e) {
            if ($this->pengajuan_id == null) {
                $this->alert('warning', 'Gagal mengirim berkas, coba beberapa saat lagi', [
                    'timerProgressBar' => true,
                ]);
            } else {
                $this->alert('success', 'Gagal mengubah berkas, coba beberapa saat lagi', [
                    'timerProgressBar' => true,
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.pengajuan.formulir-pengajuan');
    }
}
