<?php

use App\Http\Controllers\ViewFileController;
use App\Http\Controllers\SurveyController;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Pengajuan\Index as IndexPengajuan;
use App\Http\Livewire\Pages\Peta\Index as IndexPeta;
use App\Http\Livewire\Pages\Informasi\Index as IndexInformasi;

use App\Http\Livewire\Pages\Informasi\Detail as DetailInformasi;

use App\Http\Livewire\Pages\Dashboard\Index as IndexDashboard;
use App\Http\Livewire\Pages\RevisiBerkas\Index as IndexRevisiBerkas;
use App\Http\Livewire\Pages\VerifikasiBerkas\Index as IndexVerifikasiBerkas;
use App\Http\Livewire\Pages\VerifikasiBerkas\Edit as EditVerifikasiBerkas;
use App\Http\Livewire\Pages\VerifikasiLapangan\Index as IndexVerifikasiLapangan;
use App\Http\Livewire\Pages\VerifikasiLapangan\FormulirVerifikasi as FormulirVerifikasiLapangan;
use App\Http\Livewire\Pages\PenerbitanSurat\Index as IndexPenerbitanSurat;
use App\Http\Livewire\Pages\PersetujuanKetuaTkprd\Index as IndexPersetujuanKetuaTkprd;
use App\Http\Livewire\Pages\PersetujuanKadisPupr\Index as IndexPersetujuanKadisPupr;
use App\Http\Livewire\Pages\PenomoranSurat\Index as IndexPenomoranSurat;
use App\Http\Livewire\Pages\UploadScanSuratRekomendasi\Index as IndexUploadScanSuratRekomendasi;
use App\Http\Livewire\Pages\UbahStatusPengajuan\Index as IndexUbahStatusPengajuan;
use App\Http\Livewire\Pages\SuratRekomendasi\Index as IndexSuratRekomendasi;
use App\Http\Livewire\Pages\PengajuanDitolak\Index as IndexPengajuanDitolak;
use App\Http\Livewire\Pages\SeluruhPengajuan\Index as IndexSeluruhPengajuan;
use App\Http\Livewire\Pages\Peta\DetailLahan;

use App\Http\Livewire\Pages\KelolaPegawaiDinas\Index as IndexKelolaPegawaiDinas;
use App\Http\Livewire\Pages\KelolaAdmin\Index as IndexKelolaAdmin;

use App\Http\Livewire\Pages\KelolaLanding\Index as IndexKelolaLanding;
use App\Http\Livewire\Pages\ManualBook\Index as IndexManualBook;

use App\Http\Livewire\Pages\KelolaUser\Index as IndexKelolaUser;

use App\Http\Livewire\Pages\KelolaSurat\BeritaAcara\Index as IndexKelolaSuratBeritaAcara;
use App\Http\Livewire\Pages\KelolaSurat\NotaDinas\Index as IndexKelolaSuratNotaDinas;
use App\Http\Livewire\Pages\KelolaSurat\SuratRekomendasi\Index as IndexKelolaSuratSuratRekomendasi;

use App\Http\Livewire\Pages\JenisTanah\Index as IndexJenisTanah;
use App\Http\Livewire\Pages\JenisTanah\Tambah as TambahJenisTanah;

use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/pengajuan', IndexPengajuan::class);
Route::get('/peta', IndexPeta::class);
Route::get('/peta', IndexPeta::class);
Route::get('/informasi', IndexInformasi::class);
Route::get('/detail-peta/{id}', DetailLahan::class)->name('detail-peta');

//manual book
Route::get('/manualbooks', SurveyController::class . '@viewManualBook');

//lihat detail polygon
Route::get('/informasi/{id}', DetailInformasi::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', IndexDashboard::class);

    // revisi berkas
    Route::group(['middleware' => ['can:revisi-berkas']], function () {
        Route::get('/revisi-berkas', IndexRevisiBerkas::class);
    });

    // index jenis tanah
    Route::group(['middleware' => ['can:jenis-tanah']], function () {
        Route::get('/jenis-tanah', IndexJenisTanah::class);
    });

    // tambah jenis tanah

    // verifikasi berkas
    Route::group(['middleware' => ['can:verifikasi-berkas']], function () {
        Route::get('/verifikasi-berkas', IndexVerifikasiBerkas::class);
        Route::get('/verifikasi-berkas/{id}', EditVerifikasiBerkas::class);
        // Route::get('/verifikasi-berkas/{id}', FormulirPengajuan::class);
    });

    // verifikasi lapangan
    Route::group(['middleware' => ['can:verifikasi-lapangan']], function () {
        Route::get('/verifikasi-lapangan', IndexVerifikasiLapangan::class);
        Route::get('/verifikasi-lapangan/{id}', FormulirVerifikasiLapangan::class);
    });

    // penerbitan surat
    Route::group(['middleware' => ['can:penerbitan-surat']], function () {
        Route::get('/penerbitan-surat', IndexPenerbitanSurat::class);
    });

    // persetujuan ketua tkprd
    Route::group(['middleware' => ['can:persetujuan-tkprd']], function () {
        Route::get('/persetujuan-ketua-tkprd', IndexPersetujuanKetuaTkprd::class);
    });

    // persetujuan kadis pupr
    Route::group(['middleware' => ['can:persetujuan-pupr']], function () {
        Route::get('/persetujuan-kadis-pupr', IndexPersetujuanKadisPupr::class);
    });

    // penomoran surat
    Route::group(['middleware' => ['can:penomoran-surat']], function () {
        Route::get('/penomoran-surat', IndexPenomoranSurat::class);
    });

    // upload scan surat rekomendasi
    Route::group(['middleware' => ['can:upload-scan-surat-rekomendasi']], function () {
        Route::get('/upload-scan-surat-rekomendasi', IndexUploadScanSuratRekomendasi::class);
    });

    // upload scan surat rekomendasi
    Route::group(['middleware' => ['can:ubah-status-pengajuan']], function () {
        Route::get('/ubah-status-pengajuan', IndexUbahStatusPengajuan::class);
    });

    // surat rekomendasi
    Route::get('/surat-rekomendasi', IndexSuratRekomendasi::class);

    // surat rekomendasi
    Route::get('/pengajuan-ditolak', IndexPengajuanDitolak::class);

    // seluruh pengajuan
    Route::get('/seluruh-pengajuan', IndexSeluruhPengajuan::class);

    // kelola pegawai dinas
    Route::group(['middleware' => ['can:kelola-pegawai-dinas']], function () {
        Route::get('/kelola-pegawai-dinas', IndexKelolaPegawaiDinas::class);
    });

    // kelola admin
    Route::group(['middleware' => ['can:kelola-admin']], function () {
        Route::get('/kelola-admin', IndexKelolaAdmin::class);
        Route::get('/kelola-landing', IndexKelolaLanding::class);
        Route::get('/manual-book', IndexManualBook::class);
    });

    // kelola user
    Route::group(['middleware' => ['can:kelola-user']], function () {
        Route::get('/kelola-user', IndexKelolaUser::class);
    });

    // kelola surat
    Route::group(['middleware' => ['can:kelola-surat']], function () {
        Route::get('/kelola-surat/berita-acara', IndexKelolaSuratBeritaAcara::class);
        Route::get('/kelola-surat/nota-dinas', IndexKelolaSuratNotaDinas::class);
        Route::get('/kelola-surat/surat-rekomendasi', IndexKelolaSuratSuratRekomendasi::class);
    });

    // view file upload
    Route::get('fotocopy-ktp/{id}', ViewFileController::class . '@viewFotocopyKTP');
    Route::get('fotocopy-sertifikat/{id}', ViewFileController::class . '@viewFotocopySertifikat');
    Route::get('fotocopy-sppt-pbb/{id}', ViewFileController::class . '@viewFotocopySPPTPBB');
    Route::get('fotocopy-npwp/{id}', ViewFileController::class . '@viewFotocopyNPWP');
    Route::get('surat-persetujuan-tetangga/{id}', ViewFileController::class . '@viewSuratPersetujuanTetangga');
    Route::get('gambar-rencana-pembangunan/{id}/{no}', ViewFileController::class . '@viewGambarRencanaPembangunan');
    Route::get('fotocopy-akte-pendirian-perusahaan/{id}', ViewFileController::class . '@viewFotocopyAktePendirianPerusahaan');
    Route::get('set-lokasi-bangunan/{id}', ViewFileController::class . '@viewSetLokasiBangunan');
    Route::get('surat-pernyataan-force-majeur/{id}', ViewFileController::class . '@viewSuratPernyataanForceMajeur');
    Route::get('proposal/{id}', ViewFileController::class . '@viewProposal');



    Route::get('/survey/{id}', SurveyController::class . '@edit')->name('survey.edit');
    Route::put('/survey/update', SurveyController::class . '@update')->name('survey.update');




    // view file generated
    Route::get('surat-pernyataan/{id}', ViewFileController::class . '@viewSuratPernyataan');
    Route::get('surat-permohonan-skpr/{id}', ViewFileController::class . '@viewSuratPermohonanSKPR');
    Route::get('surat-permohonan-tkprd/{id}', ViewFileController::class . '@viewSuratPermohonanTKPRD');
    Route::get('berita-acara/{id}', ViewFileController::class . '@viewBeritaAcara');
    Route::get('dokumentasi/{id}', ViewFileController::class . '@viewDokumentasi');
    Route::get('nota-dinas/{id}', ViewFileController::class . '@viewNotaDinas');
    Route::get('surat-hasil-rekomendasi/{id}', ViewFileController::class . '@viewSuratHasilRekomendasi');
    Route::get('scan-surat-hasil-rekomendasi/{id}', ViewFileController::class . '@viewSacnSuratHasilRekomendasi');
});
