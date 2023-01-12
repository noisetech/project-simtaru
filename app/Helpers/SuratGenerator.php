<?php

namespace App\Helpers;

use App\Models\PegawaiDinas;
use App\Models\Pengajuan;
use App\Models\SettingSurat;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class SuratGenerator
{
    public static function generateSuratPernyataan($id, $path)
    {
        $pemohon = Pengajuan::find($id);

        $pdf = PDF::loadView('pdf.surat_pernyataan', compact('pemohon'));
        Storage::put($path . '/Surat Pernyataan - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->surat_pernyataan = $path . '/Surat Pernyataan - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }

    public static function generateSuratPermohonanSKPR($id, $path)
    {
        $pemohon = Pengajuan::find($id);

        if ($pemohon->gambar_rencana_pembangunan != null) {
            $path_gambar = storage_path('app/');
            $gambar_rencana_pembangunan = json_decode($pemohon->gambar_rencana_pembangunan);
            foreach ($gambar_rencana_pembangunan as $key => $value) {
                $gambar_rencana_pembangunan[$key] = $path_gambar . $value;
            }
            $pdf = PDF::loadView('pdf.surat_permohonan_skpr', compact('pemohon', 'gambar_rencana_pembangunan'));
        } else {
            $pdf = PDF::loadView('pdf.surat_permohonan_skpr', compact('pemohon'));
        }

        Storage::put($path . '/Surat Permohonan SKPR - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->surat_permohonan_skpr = $path . '/Surat Permohonan SKPR - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }

    public static function generateSuratPermohonanTKPRD($id, $path)
    {
        $pemohon = Pengajuan::find($id);

        if ($pemohon->gambar_rencana_pembangunan != null) {
            $path_gambar = storage_path('app/');
            $gambar_rencana_pembangunan = json_decode($pemohon->gambar_rencana_pembangunan);
            foreach ($gambar_rencana_pembangunan as $key => $value) {
                $gambar_rencana_pembangunan[$key] = $path_gambar . $value;
            }
            $pdf = PDF::loadView('pdf.surat_permohonan_tkprd', compact('pemohon', 'gambar_rencana_pembangunan'));
        } else {
            $pdf = PDF::loadView('pdf.surat_permohonan_skpr', compact('pemohon'));
        }

        Storage::put($path . '/Surat Permohonan TKPRD - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->surat_permohonan_tkprd = $path . '/Surat Permohonan TKPRD - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }

    public static function generateBeritaAcara($id, $path)
    { 
        $pemohon = Pengajuan::find($id); 
        $kabid = PegawaiDinas::find(2);
        $kasi = PegawaiDinas::find(3);
        $staf = PegawaiDinas::find(4);
        $setting_ba = SettingSurat::where('key', '=', 'persyaratan_berita_acara')->first(); 
        $setting_pengantar_ba = SettingSurat::where('key', '=', 'pengantar_berita_acara')->first(); 
        $setting_pengantar_ba2 = SettingSurat::where('key', '=', 'pengantar_berita_acara2')->first(); 
        $setting_penghubung_ba = SettingSurat::where('key', '=', 'penghubung_hasil_survey_berita_acara')->first(); 

        $tanggal_peninjauan = $pemohon->tanggal_peninjauan_lokasi->isoFormat('D');
        $bulan_peninjauan = $pemohon->tanggal_peninjauan_lokasi->isoFormat('M');
        $tahun_peninjauan = $pemohon->tanggal_peninjauan_lokasi->isoFormat('Y');
        // dd($bulan_peninjauan);

        $pdf = PDF::loadView('pdf.berita_acara', compact('pemohon', 'kabid', 'kasi', 'staf', 'tanggal_peninjauan', 'bulan_peninjauan', 'tahun_peninjauan', 'setting_ba','setting_pengantar_ba', 'setting_penghubung_ba','setting_pengantar_ba2' ));
        Storage::put($path . '/Berita Acara - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->berita_acara = $path . '/Berita Acara - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }

    public static function generateFileDokumentasi($id, $path)
    {
        $pemohon = Pengajuan::find($id);

        if ($pemohon->gambar_rencana_pembangunan != null) {
            $path_gambar = storage_path('app/');
            $foto_dokumentasi = json_decode($pemohon->foto_dokumentasi);
            foreach ($foto_dokumentasi as $key => $value) {
                $foto_dokumentasi[$key] = $path_gambar . $value;
            }
            $pdf = PDF::loadView('pdf.file_dokumentasi', compact('pemohon', 'foto_dokumentasi'));
        } else {
            $pdf = PDF::loadView('pdf.file_dokumentasi', compact('pemohon'));
        }

        Storage::put($path . '/Dokumentasi - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->file_dokumentasi = $path . '/Dokumentasi - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }

    public static function generateNotaDinas($id, $path)
    {
        $pemohon = Pengajuan::find($id);
        $kabid = PegawaiDinas::find(2);
        $dasar_nota_dinas = SettingSurat::where('key', '=', 'dasar_notadinas')->first();
        $dasar_nota_dinas2 = SettingSurat::where('key', '=', 'dasar_notadinas2')->first();
        $dasar_nota_dinas3 = SettingSurat::where('key', '=', 'dasar_notadinas3')->first();
        $Tujuan_nota = SettingSurat::where('key', '=', 'Tujuan_nota')->first();
        $Sifat_nota = SettingSurat::where('key', '=', 'Sifat_nota')->first();
        $Perihal_nota = SettingSurat::where('key', '=', 'Perihal_nota')->first();

        $pdf = PDF::loadView('pdf.nota_dinas', compact('pemohon', 'kabid', 'dasar_nota_dinas','dasar_nota_dinas2','dasar_nota_dinas3','Tujuan_nota','Sifat_nota','Perihal_nota'));
        Storage::put($path . '/Nota Dinas - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->nota_dinas = $path . '/Nota Dinas - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }

    public static function generateSuratRekomendasi($id, $path)
    {
        $pemohon = Pengajuan::find($id);
        $kepala_dinas_pupr = PegawaiDinas::find(1);
        $dasar_surat_rekomendasi = SettingSurat::where('key', '=', 'dasar_surat_rekomendasi')->first();
        $ketentuan_surat_rekomendasi = SettingSurat::where('key', '=', 'ketentuan_surat_rekomendasi')->first();
        $penghubung_surat_pemanfaatan = SettingSurat::where('key', '=', 'penghubung_surat_pemanfaatan')->first();
        $tembusan_surat_pemanfaatan = SettingSurat::where('key', '=', 'tembusan_surat_pemanfaatan')->first();

        // $titik_koordinat = str_replace('°', '%C2%B0', $pemohon->titik_koordinat);
        $titik_koordinat = str_replace('"', '%22', $pemohon->titik_koordinat);
        $titik_koordinat = str_replace(' ', '+', $titik_koordinat);

        $pdf = PDF::loadView('pdf.surat_keterangan_pemanfaatan_ruang', compact('pemohon', 'kepala_dinas_pupr', 'dasar_surat_rekomendasi',
         'ketentuan_surat_rekomendasi', 'titik_koordinat','tembusan_surat_pemanfaatan','penghubung_surat_pemanfaatan'));
        Storage::put($path . '/Surat Rekomendasi - ' . $pemohon->nama_lengkap . '.pdf', $pdf->output());
        $pemohon->surat_hasil_rekomendasi = $path . '/Surat Rekomendasi - ' . $pemohon->nama_lengkap . '.pdf';
        $pemohon->update();
    }
}
