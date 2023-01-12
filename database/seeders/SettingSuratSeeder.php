<?php

namespace Database\Seeders;

use App\Models\SettingSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingSurat::create([
            'key' => 'persyaratan_berita_acara',
            'value' => '<ol><li>Setelah disetujuinya permohonan rekomendasi izin pemanfaatan ruang, pemohon segera melaksanakan kegiatan sebagaimana dimohon paling lambat 12 (dua belas) bulan setelah rekomendasi izin pemanfaatan ruang diterbitkan.</li><li>Dilarang memindah tangankan/memperjual belikan rekomendasi izin pemanfaatan ruang yang telah diperoleh kepada pihak lain.</li></ol><p>Demikian berita acara pemberian rekomendasi izin pemanfaatan ruang ini dibuat untuk dipergunakan sebagaimana mestinya.</p>',
        ]);
        SettingSurat::create([
            'key' => 'dasar_notadinas',
            'value' => '<ol><li class="ql-align-justify">Undang-Undang Nomor 26 Tahun 2007 tentang Penataan Ruang;</li><li class="ql-align-justify">Peraturan Daerah Nomor 4 Tahun 2014 tentang Rencana Tata Ruang Wilayah Kabupaten Lampung Utara Tahun 2014-2034;</li><li class="ql-align-justify">Keputusan Bupati Lampung Utara Nomor : B/60/15-LU/HK/2019 tanggal 2 Januari 2019 tentang Kriteria dan jenis perizinan yang memerlukan rekomendasi tim koordinasi penataan ruang daerah serta kriteria dan jenis perizinan yang memerlukan rekomendasi pemanfaatan ruang;</li></ol>',
        ]);
        SettingSurat::create([
            'key' => 'dasar_surat_rekomendasi',
            'value' => '<ol><li class="ql-align-justify">Undang-Undang Nomor 26 Tahun 2007 tentang Penataan Ruang.</li><li class="ql-align-justify">Peraturan Daerah Nomor 4 Tahun 2014 tentang Rencana Tata Ruang Wilayah Kabupaten Lampung Utara Tahun 2014-2034.</li><li class="ql-align-justify">Keputusan Bupati Lampung Utara Nomor: B/333/15-LU/HK/2018 tanggal 11 Desember 2018 tentang Tim Koordinasi Penataan Ruang Daerah (TKPRD) Kabupaten Lampung Utara.</li><li class="ql-align-justify">Keputusan Bupati Lampung Utara Nomor: B/60/15-LU/HK/2019 tanggal 2 Januari 2019 tentang Kriteria dan jenis perizinan yang memerlukan rekomendasi tim koordinasi penataan ruang daerah serta kriteria dan jenis perizinan yang memerlukan rekomendasi pemanfaatan ruang</li></ol>',
        ]);
        SettingSurat::create([
            'key' => 'ketentuan_surat_rekomendasi',
            'value' => '<ol><li class="ql-align-justify">Pengusaha agar dapat meminimalisir dampak lingkungan dan sosial terhadap masyarakat sekitar, serta senantiasa menjalin hubungan harmonis dengan masyarakat sekitar;</li><li class="ql-align-justify">Pemohon agar dapat memperhatikan Garis Sempadan Bangunan dan Ketinggian Bangunan sesuai peraturan yang berlaku di wilayah Kabupaten Lampung Utara;</li><li class="ql-align-justify">Pemohon bertanggung jawab sepenuhnya atas kerugian masyarakat sekitar atas dampak dari usaha dimaksud;</li><li class="ql-align-justify">Dalam jangka waktu 12 (dua belas) bulan terhitung sejak tanggal ditetapkannya rekomendasi ini, tanah tersebut harus benar-benar telah berubah penggunaannya/ peruntukkan ruangnya sesuai dengan maksud permohonan;</li><li class="ql-align-justify">Dilarang memindah tangankan / memperjual belikan rekomendasi izin pemanfaatan ruang yang telah diperoleh kepada pihak lain;</li><li class="ql-align-justify">Apabila ketentuan-ketentuan tersebut tidak dipenuhi atau ditaati, maka surat rekomendasi izin pemanfaatan ruang ini batal demi hukum,dan tanah tersebut keadaan fungsi ruangnya kembali seperti semula;</li><li class="ql-align-justify">Surat Keterangan ini mulai berlaku pada tanggal ditetapkan, dan segala sesuatunya akan ditinjau kembali apabila dikemudian hari ternyata terdapat kekeliruan.</li></ol>',
        ]);
    }
}
