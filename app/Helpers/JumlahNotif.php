<?php

namespace App\Helpers;

use App\Models\Pengajuan;

class JumlahNotif
{
    public static function revisiBerkas()
    {
        $role = auth()->user()->getRoleNames()->first();
        if ($role === 'Sekretariat-TKPRD') {
            return Pengajuan::whereIn('status_id', [7, 9])->count();
        } elseif ($role === 'Pokja-PRPPR') {
            return Pengajuan::where('status_id', '=', 4)->count();
        }
        return Pengajuan::whereIn('status_id', [4, 7, 9])->count();
    }

    public static function verifikasiBerkas()
    {
        return Pengajuan::where('status_id', '=', 2)->count();
    }

    public static function verifikasiLapangan()
    {
        return Pengajuan::where('status_id', '=', 3)->count();
    }

    public static function penerbitanSurat()
    {
        return Pengajuan::where('status_id', '=', 5)->count();
    }

    public static function persetujuanTKPRD()
    {
        return Pengajuan::where('status_id', '=', 6)->count();
    }

    public static function persetujuanPUPR()
    {
        return Pengajuan::where('status_id', '=', 8)->count();
    }

    public static function penomoranSurat()
    {
        return Pengajuan::where('status_id', '=', 10)->count();
    }

    public static function uploadScanSuratRekomendasi()
    {
        return Pengajuan::where('status_id', '=', 11)->where('scan_surat_hasil_rekomendasi', '=', null)->count();
    }

    public static function suratRekomendasi()
    {
        $user = auth()->user()->getRoleNames()->first();
        if ($user === 'Pemohon') {
            return Pengajuan::whereIn('status_id', [11, 12])->where('user_id', '=', auth()->id())->count();
        }
        return Pengajuan::whereIn('status_id', [11, 12])->count();
    }

    public static function pengajuanDitolak()
    {
        $user = auth()->user()->getRoleNames()->first();
        if ($user === 'Pemohon') {
            return Pengajuan::where('status_id', '=', 1)->where('user_id', '=', auth()->id())->count();
        }
        return Pengajuan::where('status_id', '=', 1)->count();
    }

    public static function seluruhPengajuan()
    {
        $user = auth()->user()->getRoleNames()->first();
        if ($user === 'Pemohon') {
            return Pengajuan::where('user_id', '=', auth()->id())->count();
        }
        return Pengajuan::get()->count();
    }

    public static function pengajuanDiproses()
    {
        $user = auth()->user()->getRoleNames()->first();
        if ($user === 'Pemohon') {
            return Pengajuan::where('user_id', '=', auth()->id())
                ->whereNotIn('status_id', [1, 11, 12])
                ->count();
        }
        return Pengajuan::whereNotIn('status_id', [1, 11, 12])->count();
    }
}
