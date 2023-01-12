<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Manual_book;
use Illuminate\Http\Request;

class ViewFileController extends Controller
{
    public function checkPermission($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->user_id != auth()->user()->id && auth()->user()->hasRole('Pemohon')) {
            return abort(404);
        }

        return true;
    }
 
    public function viewFotocopyKTP($id)
    {
        $pengajuan = Pengajuan::find($id);
       

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->fotocopy_ktp);
            return response()->file($path);
        }
    }


    public function viewManualBook()
    {
        $manual_book = Manual_book::find(1); 
        
            $path = storage_path('app/' .$manual_book->dokumen);
            return response()->file($path);
        
    }


    public function viewFotocopySertifikat($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->fotocopy_sertifikat);
            return response()->file($path);
        }
    }

    public function viewFotocopySPPTPBB($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->fotocopy_sppt_pbb);
            return response()->file($path);
        }
    }

    public function viewFotocopyNPWP($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->fotocopy_npwp);
            return response()->file($path);
        }
    }

    public function viewSuratPersetujuanTetangga($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->surat_persetujuan_tetangga);
            return response()->file($path);
        }
    }

    public function viewGambarRencanaPembangunan($id, $no)
    {
        $pengajuan = Pengajuan::find($id);
        $gambar = json_decode($pengajuan->gambar_rencana_pembangunan);
        $no--;

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $gambar[$no]);
            return response()->file($path);
        }
    }

    public function viewFotocopyAktePendirianPerusahaan($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->fotocopy_akte_pendirian_perusahaan);
            return response()->file($path);
        }
    }

    public function viewSetLokasiBangunan($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->set_lokasi_bangunan);
            return response()->file($path);
        }
    }

    public function viewSuratPernyataanForceMajeur($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->surat_pernyataan_force_majeur);
            return response()->file($path);
        }
    }

    public function viewProposal($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->proposal);
            return response()->file($path);
        }
    }

    public function viewSuratPernyataan($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->surat_pernyataan);
            return response()->file($path);
        }
    }

    public function viewSuratPermohonanSKPR($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->surat_permohonan_skpr);
            return response()->file($path);
        }
    }

    public function viewSuratPermohonanTKPRD($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id)) {
            $path = storage_path('app/' . $pengajuan->surat_permohonan_tkprd);
            return response()->file($path);
        }
    }

    public function viewBeritaAcara($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id) && $pengajuan->berita_acara) {
            
            $path = storage_path('app/' . $pengajuan->berita_acara);
            return response()->file($path);
        }
        abort(404);
    } 
 
    public function viewDokumentasi($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id) && $pengajuan->file_dokumentasi) {
            $path = storage_path('app/' . $pengajuan->file_dokumentasi);
            return response()->file($path);
        }
        abort(404);
    }

    public function viewNotaDinas($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id) && $pengajuan->nota_dinas) {
            $path = storage_path('app/' . $pengajuan->nota_dinas);
            return response()->file($path);
        }
        abort(404);
    }

    public function viewSuratHasilRekomendasi($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id) && $pengajuan->surat_hasil_rekomendasi) {
            $path = storage_path('app/' . $pengajuan->surat_hasil_rekomendasi);
            return response()->file($path);
        }
        abort(404);
    }

    public function viewSacnSuratHasilRekomendasi($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($this->checkPermission($id) && $pengajuan->scan_surat_hasil_rekomendasi) {
            $path = storage_path('app/' . $pengajuan->scan_surat_hasil_rekomendasi);
            return response()->file($path);
        }
        abort(404);
    }
}
