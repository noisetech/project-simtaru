<?php

namespace App\Http\Livewire\Components;

use App\Helpers\SuratGenerator;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
 use Livewire\WithFileUploads;

class PengajuanTableDashboard extends DataTableComponent
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['refreshPengajuanTableDashboard' => '$refresh',
    'handleOpenModalUploadScanSuratRekomendasi', 'handleOpenModalHapusScanSuratRekomendasi',
    'openModalUploadKTP', 'openModalUploadSertifikat'];

    public $status_id, $scan_surat_hasil_rekomendasi;
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

    public $openModalUploadScanSuratRekomendasi = false;
    public $openModalHapusScanSuratRekomendasi = false;
    public $openModalHapusKTP = false;
    public $openModalUploadKTP = false;
    public $openModalUploadSertifikat = false;
    public $openModalHapusSertifikat = false;
    public $openModalUploadSPPT = false;
    public $openModalHapusSPPT = false;
    public $openModalUploadNPWP = false;
    public $openModalHapusNPWP = false;
    public $openModalUploadSTetangga = false;
    public $openModalHapusSTetangga = false;
    public $openModalUploadAkte = false;
    public $openModalHapusAkte = false;
    public $openModalUploadLokasi = false;
    public $openModalHapusLokasi = false;
    public $openModalUploadRencana = false;
    public $openModalHapusRencana = false;
    public $openModalUploadForce = false;
    public $openModalHapusForce = false;
    public $openModalUploadProposal = false;
    public $openModalHapusProposal = false;



//mulai
       // upload scan surat rekomendasi
       public function handleOpenModalUploadScanSuratRekomendasi($id)
       {
           $pengajuan  = Pengajuan::find($id);
           $this->pengajuan_id = $id;
           $this->nama_lengkap = $pengajuan->nama_lengkap;
           $this->openModalUploadScanSuratRekomendasi = true;
       }

       public function handleCloseModalUploadScanSuratRekomendasi()
       {
           $this->scan_surat_hasil_rekomendasi = null;
           $this->resetValidation();
           $this->openModalUploadScanSuratRekomendasi = false;
       }

       protected $rules = [
           'scan_surat_hasil_rekomendasi' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
       ];

       protected $rules_Akte = [
        'fotocopy_akte_pendirian_perusahaan' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

       protected $rules_STetangga = [
        'surat_persetujuan_tetangga' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

       protected $rules_SPPT = [
        'fotocopy_sppt_pbb' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

       protected $rules_KTP = [
        'fotocopy_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];


        protected $rules_Force = [
            'surat_pernyataan_force_majeur' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ];

            protected $rules_Proposal = [
                'proposal' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                ];

        protected $rules_Lokasi = [
            'set_lokasi_bangunan' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ];



        protected $rules_NPWP = [
            'fotocopy_npwp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ];


        protected $rules_Sertifikat = [
            'fotocopy_sertifikat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];


        public function rules_Rencana()
        {
            return [
                'gambar_rencana_pembangunan' => ['nullable', function ($attribute, $value, $fail) {
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


        //edit Lokasi
      public function uploadLokasi($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalUploadLokasi = true;
      }

      public function handleCloseModalUploadLokasi()
      {
          $this->fotocopy_Lokasi = null;
          $this->resetValidation();
          $this->openModalUploadLokasi = false;
      }

       //    proses menyimpan dari modalnya
       public function uploadLokasi2()
       {
           $this->validate($this->rules_Lokasi);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->set_lokasi_bangunan = $this->set_lokasi_bangunan->store($path);
               $pengajuan->update();

               $this->handleCloseModalUploadLokasi();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload file fc Lokasi', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload file fc Lokasi', [
                   'timerProgressBar' => true,
               ]);
           }
       }


//delete Lokasi
    public function hapusLokasi($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusLokasi = true;
    }

    public function handleCloseModalHapusLokasi()
    {
        $this->fotocopy_Lokasi = null;
        $this->resetValidation();
        $this->openModalHapusLokasi = false;
    }

     //proses delete dari modal
     public function HapusBerkasLokasi()
     {
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $pengajuan->set_lokasi_bangunan = null;

             $pengajuan->save();
             $this->openModalHapusLokasi = false;
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->openModalHapusLokasi = false;
             $this->alert('warning', 'Gagal', [
                 'timerProgressBar' => true,
             ]);
         }
     }



     //edit Rencana
     public function uploadRencana($id)
     {
         $pengajuan  = Pengajuan::find($id);
         $this->pengajuan_id = $id;
         $this->nama_lengkap = $pengajuan->nama_lengkap;
         $this->openModalUploadRencana = true;
     }

     public function handleCloseModalUploadRencana()
     {
         $this->fotocopy_Rencana = null;
         $this->resetValidation();
         $this->openModalUploadRencana = false;
     }

      //    proses menyimpan dari modalnya
      public function uploadRencana2()
      {
        $this->validate(
            $this->rules_Rencana()
        );

          try {
              $pengajuan = Pengajuan::find($this->pengajuan_id);
              $path = 'pengajuan/' . $pengajuan->id;

              $gambar_rencana_pembangunan = [];
                for ($i = 0; $i < count($this->gambar_rencana_pembangunan); $i++) {
                    $gambar_rencana_pembangunan[$i] = $this->gambar_rencana_pembangunan[$i]->store($path);
                }
                $pengajuan->gambar_rencana_pembangunan = json_encode($gambar_rencana_pembangunan);


            //   $pengajuan->gambar_rencana_pembangunan = $this->gambar_rencana_pembangunan->store($path);
              $pengajuan->update();

              $this->handleCloseModalUploadRencana();
              $this->emit('refreshSidebar');
              $this->emit('refreshPengajuanTableDashboard');
              $this->alert('success', 'Berhasil meng-upload file fc Rencana', [
                  'timerProgressBar' => true,
              ]);
          } catch (\Exception $e) {
              $this->alert('warning', 'Gagal meng-upload file fc Rencana', [
                  'timerProgressBar' => true,
              ]);
          }
      }


//delete Rencana
   public function hapusRencana($id)
   {
       $pengajuan  = Pengajuan::find($id);
       $this->pengajuan_id = $id;
       $this->nama_lengkap = $pengajuan->nama_lengkap;
       $this->openModalHapusRencana = true;
   }

   public function handleCloseModalHapusRencana()
   {
       $this->fotocopy_Rencana = null;
       $this->resetValidation();
       $this->openModalHapusRencana = false;
   }

    //proses delete dari modal
    public function HapusBerkasRencana()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->gambar_rencana_pembangunan = null;

            $pengajuan->save();
            $this->openModalHapusRencana = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalHapusRencana = false;
            $this->alert('warning', 'Gagal', [
                'timerProgressBar' => true,
            ]);
        }
    }


        //edit Akte
      public function uploadAkte($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalUploadAkte = true;
      }

      public function handleCloseModalUploadAkte()
      {
          $this->fotocopy_Akte = null;
          $this->resetValidation();
          $this->openModalUploadAkte = false;
      }

       //    proses menyimpan dari modalnya
       public function uploadAkte2()
       {
           $this->validate($this->rules_Akte);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->fotocopy_akte_pendirian_perusahaan = $this->fotocopy_akte_pendirian_perusahaan->store($path);
               $pengajuan->update();

               $this->handleCloseModalUploadAkte();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload file fc Akte', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload file fc Akte', [
                   'timerProgressBar' => true,
               ]);
           }
       }


//delete Akte
    public function hapusAkte($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusAkte = true;
    }

    public function handleCloseModalHapusAkte()
    {
        $this->fotocopy_Akte = null;
        $this->resetValidation();
        $this->openModalHapusAkte = false;
    }

     //proses delete dari modal
     public function HapusBerkasAkte()
     {
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $pengajuan->fotocopy_akte_pendirian_perusahaan = null;

             $pengajuan->save();
             $this->openModalHapusAkte = false;
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->openModalHapusAkte = false;
             $this->alert('warning', 'Gagal', [
                 'timerProgressBar' => true,
             ]);
         }
     }



     //edit Proposal
     public function uploadProposal($id)
     {
         $pengajuan  = Pengajuan::find($id);
         $this->pengajuan_id = $id;
         $this->nama_lengkap = $pengajuan->nama_lengkap;
         $this->openModalUploadProposal = true;
     }

     public function handleCloseModalUploadProposal()
     {
         $this->fotocopy_Proposal = null;
         $this->resetValidation();
         $this->openModalUploadProposal = false;
     }

      //    proses menyimpan dari modalnya
      public function uploadProposal2()
      {
          $this->validate($this->rules_Proposal);
          try {
              $pengajuan = Pengajuan::find($this->pengajuan_id);
              $path = 'pengajuan/' . $pengajuan->id;
              $pengajuan->proposal = $this->proposal->store($path);
              $pengajuan->update();

              $this->handleCloseModalUploadProposal();
              $this->emit('refreshSidebar');
              $this->emit('refreshPengajuanTableDashboard');
              $this->alert('success', 'Berhasil meng-upload file fc Proposal', [
                  'timerProgressBar' => true,
              ]);
          } catch (\Exception $e) {
              $this->alert('warning', 'Gagal meng-upload file fc Proposal', [
                  'timerProgressBar' => true,
              ]);
          }
      }


//delete Proposal
   public function hapusProposal($id)
   {
       $pengajuan  = Pengajuan::find($id);
       $this->pengajuan_id = $id;
       $this->nama_lengkap = $pengajuan->nama_lengkap;
       $this->openModalHapusProposal = true;
   }

   public function handleCloseModalHapusProposal()
   {
       $this->fotocopy_Proposal = null;
       $this->resetValidation();
       $this->openModalHapusProposal = false;
   }

    //proses delete dari modal
    public function HapusBerkasProposal()
    {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->proposal = null;

            $pengajuan->save();
            $this->openModalHapusProposal = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalHapusProposal = false;
            $this->alert('warning', 'Gagal', [
                'timerProgressBar' => true,
            ]);
        }
    }


    //edit Force
    public function uploadForce($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalUploadForce = true;
    }

    public function handleCloseModalUploadForce()
    {
        $this->fotocopy_Force = null;
        $this->resetValidation();
        $this->openModalUploadForce = false;
    }

     //    proses menyimpan dari modalnya
     public function uploadForce2()
     {
         $this->validate($this->rules_Force);
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $path = 'pengajuan/' . $pengajuan->id;
             $pengajuan->surat_pernyataan_force_majeur = $this->surat_pernyataan_force_majeur->store($path);
             $pengajuan->update();

             $this->handleCloseModalUploadForce();
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil meng-upload file fc Force', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->alert('warning', 'Gagal meng-upload file fc Force', [
                 'timerProgressBar' => true,
             ]);
         }
     }


//delete Force
  public function hapusForce($id)
  {
      $pengajuan  = Pengajuan::find($id);
      $this->pengajuan_id = $id;
      $this->nama_lengkap = $pengajuan->nama_lengkap;
      $this->openModalHapusForce = true;
  }

  public function handleCloseModalHapusForce()
  {
      $this->fotocopy_Force = null;
      $this->resetValidation();
      $this->openModalHapusForce = false;
  }

   //proses delete dari modal
   public function HapusBerkasForce()
   {
       try {
           $pengajuan = Pengajuan::find($this->pengajuan_id);
           $pengajuan->surat_pernyataan_force_majeur = null;

           $pengajuan->save();
           $this->openModalHapusForce = false;
           $this->emit('refreshSidebar');
           $this->emit('refreshPengajuanTableDashboard');
           $this->alert('success', 'Berhasil', [
               'timerProgressBar' => true,
           ]);
       } catch (\Exception $e) {
           $this->openModalHapusForce = false;
           $this->alert('warning', 'Gagal', [
               'timerProgressBar' => true,
           ]);
       }
   }




    //    proses menyimpan dari modalnya
       public function uploadScanSuratRekomendasi2()
       {
           $this->validate($this->rules);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->scan_surat_hasil_rekomendasi = $this->scan_surat_hasil_rekomendasi->store($path);
            //    $pengajuan->status_id = 12;
               $pengajuan->update();

               $this->handleCloseModalUploadScanSuratRekomendasi();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload scan surat hasil rekomendasi', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload scan surat hasil rekomendasi', [
                   'timerProgressBar' => true,
               ]);
           }
       }


      // hapus scan surat rekomendasi
      public function hapusScanSuratRekomendasi($id)
      {
          $this->emit('handleOpenModalHapusScanSuratRekomendasi', $id);
      }


      public function handleOpenModalHapusScanSuratRekomendasi($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalHapusScanSuratRekomendasi = true;
      }

      public function handleCloseModalHapusScanSuratRekomendasi()
      {
          $this->scan_surat_hasil_rekomendasi = null;
          $this->resetValidation();
          $this->openModalHapusScanSuratRekomendasi = false;
      }

      //proses delete dari modal
      public function HapusBerkasScan()
      {
          try {
              $pengajuan = Pengajuan::find($this->pengajuan_id);
              $pengajuan->scan_surat_hasil_rekomendasi = null;
              $pengajuan->status_id = 11;

              $pengajuan->save();
              $this->openModalHapusScanSuratRekomendasi = false;
              $this->emit('refreshSidebar');
              $this->emit('refreshPengajuanTableDashboard');
              $this->alert('success', 'Berhasil', [
                  'timerProgressBar' => true,
              ]);
          } catch (\Exception $e) {
              $this->openModalHapusScanSuratRekomendasi = false;
              $this->alert('warning', 'Gagal', [
                  'timerProgressBar' => true,
              ]);
          }
      }



      //edit STetangga
      public function uploadSTetangga($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalUploadSTetangga = true;
      }

      public function handleCloseModalUploadSTetangga()
      {
          $this->fotocopy_STetangga = null;
          $this->resetValidation();
          $this->openModalUploadSTetangga = false;
      }

       //    proses menyimpan dari modalnya
       public function uploadSTetangga2()
       {
           $this->validate($this->rules_STetangga);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->surat_persetujuan_tetangga = $this->surat_persetujuan_tetangga->store($path);
               $pengajuan->update();

               $this->handleCloseModalUploadSTetangga();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload file fc Surat persetujuan tetangga', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload file Surat Persetujuan Tetangga', [
                   'timerProgressBar' => true,
               ]);
           }
       }


//delete STetangga
    public function hapusSTetangga($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusSTetangga = true;
    }

    public function handleCloseModalHapusSTetangga()
    {
        $this->fotocopy_STetangga = null;
        $this->resetValidation();
        $this->openModalHapusSTetangga = false;
    }

     //proses delete dari modal
     public function HapusBerkasSTetangga()
     {
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $pengajuan->surat_persetujuan_tetangga = null;

             $pengajuan->save();
             $this->openModalHapusSTetangga = false;
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->openModalHapusSTetangga = false;
             $this->alert('warning', 'Gagal', [
                 'timerProgressBar' => true,
             ]);
         }
     }



      //edit NPWP
      public function uploadNPWP($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalUploadNPWP = true;
      }

      public function handleCloseModalUploadNPWP()
      {
          $this->fotocopy_NPWP = null;
          $this->resetValidation();
          $this->openModalUploadNPWP = false;
      }

       //    proses menyimpan dari modalnya
       public function uploadNPWP2()
       {
           $this->validate($this->rules_NPWP);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->fotocopy_npwp = $this->fotocopy_npwp->store($path);
               $pengajuan->update();

               $this->handleCloseModalUploadNPWP();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload file fc NPWP', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload file fc NPWP', [
                   'timerProgressBar' => true,
               ]);
           }
       }


//delete NPWP
    public function hapusNPWP($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusNPWP = true;
    }

    public function handleCloseModalHapusNPWP()
    {
        $this->fotocopy_NPWP = null;
        $this->resetValidation();
        $this->openModalHapusNPWP = false;
    }

     //proses delete dari modal
     public function HapusBerkasNPWP()
     {
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $pengajuan->fotocopy_npwp = null;

             $pengajuan->save();
             $this->openModalHapusNPWP = false;
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->openModalHapusNPWP = false;
             $this->alert('warning', 'Gagal', [
                 'timerProgressBar' => true,
             ]);
         }
     }



//edit ktp
      public function uploadKTP($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalUploadKTP = true;
      }

      public function handleCloseModalUploadKTP()
      {
          $this->fotocopy_ktp = null;
          $this->resetValidation();
          $this->openModalUploadKTP = false;
      }

       //    proses menyimpan dari modalnya
       public function uploadKTP2()
       {
           $this->validate($this->rules_KTP);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->fotocopy_ktp = $this->fotocopy_ktp->store($path);
               $pengajuan->update();

               $this->handleCloseModalUploadKTP();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload file fc KTP', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload file fc KTP', [
                   'timerProgressBar' => true,
               ]);
           }
       }


//delete ktp
    public function hapusKTP($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusKTP = true;
    }

    public function handleCloseModalHapusKTP()
    {
        $this->fotocopy_ktp = null;
        $this->resetValidation();
        $this->openModalHapusKTP = false;
    }

     //proses delete dari modal
     public function HapusBerkasKTP()
     {
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $pengajuan->fotocopy_ktp = null;

             $pengajuan->save();
             $this->openModalHapusKTP = false;
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->openModalHapusKTP = false;
             $this->alert('warning', 'Gagal', [
                 'timerProgressBar' => true,
             ]);
         }
     }

        //edit SPPT
      public function uploadSPPT($id)
      {
          $pengajuan  = Pengajuan::find($id);
          $this->pengajuan_id = $id;
          $this->nama_lengkap = $pengajuan->nama_lengkap;
          $this->openModalUploadSPPT = true;
      }

      public function handleCloseModalUploadSPPT()
      {
          $this->fotocopy_SPPT = null;
          $this->resetValidation();
          $this->openModalUploadSPPT = false;
      }

       //    proses menyimpan dari modalnya
       public function uploadSPPT2()
       {
           $this->validate($this->rules_SPPT);
           try {
               $pengajuan = Pengajuan::find($this->pengajuan_id);
               $path = 'pengajuan/' . $pengajuan->id;
               $pengajuan->fotocopy_sppt_pbb = $this->fotocopy_sppt_pbb->store($path);
               $pengajuan->update();

               $this->handleCloseModalUploadSPPT();
               $this->emit('refreshSidebar');
               $this->emit('refreshPengajuanTableDashboard');
               $this->alert('success', 'Berhasil meng-upload file fc SPPT', [
                   'timerProgressBar' => true,
               ]);
           } catch (\Exception $e) {
               $this->alert('warning', 'Gagal meng-upload file fc SPPT', [
                   'timerProgressBar' => true,
               ]);
           }
       }


//delete SPPT
    public function hapusSPPT($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusSPPT = true;
    }

    public function handleCloseModalHapusSPPT()
    {
        $this->fotocopy_SPPT = null;
        $this->resetValidation();
        $this->openModalHapusSPPT = false;
    }

     //proses delete dari modal
     public function HapusBerkasSPPT()
     {
         try {
             $pengajuan = Pengajuan::find($this->pengajuan_id);
             $pengajuan->fotocopy_sppt_pbb = null;

             $pengajuan->save();
             $this->openModalHapusSPPT = false;
             $this->emit('refreshSidebar');
             $this->emit('refreshPengajuanTableDashboard');
             $this->alert('success', 'Berhasil', [
                 'timerProgressBar' => true,
             ]);
         } catch (\Exception $e) {
             $this->openModalHapusSPPT = false;
             $this->alert('warning', 'Gagal', [
                 'timerProgressBar' => true,
             ]);
         }
     }


            //edit Sertifikat
        public function uploadSertifikat($id)
        {
            $pengajuan  = Pengajuan::find($id);
            $this->pengajuan_id = $id;
            $this->nama_lengkap = $pengajuan->nama_lengkap;
            $this->openModalUploadSertifikat = true;
        }

        public function handleCloseModalUploadSertifikat()
        {
            $this->fotocopy_Sertifikat = null;
            $this->resetValidation();
            $this->openModalUploadSertifikat = false;
        }

        //    proses menyimpan dari modalnya
        public function uploadSertifikat2()
        {
            $this->validate($this->rules_Sertifikat);
            try {
                $pengajuan = Pengajuan::find($this->pengajuan_id);
                $path = 'pengajuan/' . $pengajuan->id;
                $pengajuan->fotocopy_sertifikat = $this->fotocopy_sertifikat->store($path);
                $pengajuan->update();

                $this->handleCloseModalUploadSertifikat();
                $this->emit('refreshSidebar');
                $this->emit('refreshPengajuanTableDashboard');
                $this->alert('success', 'Berhasil meng-upload file fc Sertifikat', [
                    'timerProgressBar' => true,
                ]);
            } catch (\Exception $e) {
                $this->alert('warning', 'Gagal meng-upload file fc Sertifikat', [
                    'timerProgressBar' => true,
                ]);
            }
        }


        //delete Sertifikat
        public function hapusSertifikat($id)
        {
        $pengajuan  = Pengajuan::find($id);
        $this->pengajuan_id = $id;
        $this->nama_lengkap = $pengajuan->nama_lengkap;
        $this->openModalHapusSertifikat = true;
        }

        public function handleCloseModalHapusSertifikat()
        {
        $this->fotocopy_Sertifikat = null;
        $this->resetValidation();
        $this->openModalHapusSertifikat = false;
        }

        //proses delete dari modal
        public function HapusBerkasSertifikat()
        {
        try {
            $pengajuan = Pengajuan::find($this->pengajuan_id);
            $pengajuan->fotocopy_sertifikat = null;

            $pengajuan->save();
            $this->openModalHapusSertifikat = false;
            $this->emit('refreshSidebar');
            $this->emit('refreshPengajuanTableDashboard');
            $this->alert('success', 'Berhasil', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->openModalHapusSertifikat = false;
            $this->alert('warning', 'Gagal', [
                'timerProgressBar' => true,
            ]);
        }
        }







    public function filters(): array
    {
        return [
            'from_date' => Filter::make('Dari Tanggal')
                ->date([
                    'max' => now()->format('Y-m-d'),
                ]),
            'to_date' => Filter::make('Sampai Tanggal')
                ->date([
                    'min' => isset($this->filters['from_date']) && $this->filters['from_date'] ? $this->filters['from_date'] : '',
                    'max' => now()->format('Y-m-d'),
                ])
        ];
    }

    public function columns(): array
    {
        // if ($this->status_id == 1 || $this->status_id == 0 || $this->status_id == 13) {
            if ($this->status_id == 1 || $this->status_id == 0 ) {
            return [
                Column::make(),
                Column::make('Nama', 'nama_lengkap')
                    ->searchable()
                    ->sortable(),
                Column::make('Tanggal Pengajuan', 'pengajuan.created_at')
                    ->sortable(),
                Column::make('Rencana Penggunaan Tanah', 'rencana_penggunaan_tanah')
                    ->searchable()
                    ->sortable(),
                Column::make('Status', 'status.jenis_status')
                    ->searchable()
                    ->sortable(),
            ];
        } else {
            return [
                Column::make(),
                Column::make('Nama', 'nama_lengkap')
                    ->searchable()
                    ->sortable(),
                Column::make('Tanggal Pengajuan', 'pengajuan.created_at')
                    ->sortable(),
                Column::make('Rencana Penggunaan Tanah', 'rencana_penggunaan_tanah')
                    ->searchable()
                    ->sortable(),
                Column::make('Status', 'status.jenis_status')
                    ->searchable()
                    ->sortable(),
                Column::make('Aksi'),
            ];
        }
    }

    public function query(): Builder
    {
        if ($this->status_id == 0) {
            if (auth()->user()->hasRole('Pemohon')) {
                return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                    ->where('user_id', '=', auth()->user()->id)
                    ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                    ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                    ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
            } else {
                return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                    ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                    ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                    ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
            }
        } elseif ($this->status_id == 13) {
            if (auth()->user()->hasRole('Pemohon')) {
                return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                    ->whereIn('status_id', [11, 12])
                    ->where('user_id', '=', auth()->user()->id)
                    ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                    ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                    ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
            } else {
                return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                    ->whereIn('status_id', [11, 12])
                    ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                    ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                    ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
            }
        } elseif ($this->status_id == 14) {
            return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
        } else {
            if (auth()->user()->hasRole('Pemohon')) {
                return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                    ->where('status_id', '=', $this->status_id)
                    ->where('user_id', '=', auth()->user()->id)
                    ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                    ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                    ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
            } else {
                return Pengajuan::query()->join('status', 'status.id', '=', 'pengajuan.status_id')
                    ->where('status_id', '=', $this->status_id)
                    ->select('pengajuan.*', 'status.jenis_status as jenis_status', 'status.posisi_berkas as posisi_berkas')
                    ->when($this->getFilter('from_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '>=', $created_at))
                    ->when($this->getFilter('to_date'), fn ($query, $created_at) => $query->whereDate('pengajuan.created_at', '<=', $created_at));
            }
        }
    }

    public function rowView(): string
    {
        return 'livewire.components.pengajuan-table-dashboard';
    }

    // revisi nota dinas
    public function revisiNotaDinas($id)
    {
        $this->emit('handleOpenModalRevisiNotaDinas', $id);
    }

    // revisi surat rekomendasi
    public function revisiSuratRekomendasi($id)
    {
        $this->emit('handleOpenModalRevisiSuratRekomendasi', $id);
    }

    // verifikasi berkas
    public function setujuVerifikasiBerkas($id)
    {
        $this->emit('handleOpenModalSetujuVerifikasiBerkas', $id);
    }
    public function tolakVerifikasiBerkas($id)
    {
        $this->emit('handleOpenModalTolakVerifikasiBerkas', $id);
    }

    // verifikasi lapangan
    public function tolakVerifikasiLapangan($id)
    {
        $this->emit('handleOpenModalTolakVerifikasiLapangan', $id);
    }

    // penerbitan surat
    public function revisiPenerbitanSurat($id)
    {
        $this->emit('handleOpenModalRevisiPenerbitanSurat', $id);
    }
    public function setujuPenerbitanSurat($id)
    {
        $this->emit('handleOpenModalSetujuPenerbitanSurat', $id);
    }

    // persetujuan ketua tkprd
    public function revisiPersetujuanKetuaTKPRD($id)
    {
        $this->emit('handleOpenModalRevisiPersetujuanKetuaTKPRD', $id);
    }
    public function setujuPersetujuanKetuaTKPRD($id)
    {
        $this->emit('handleOpenModalSetujuPersetujuanKetuaTKPRD', $id);
    }

    // persetujuan kadis pupr
    public function tolakPersetujuanKadisPUPR($id)
    {
        $this->emit('handleOpenModalTolakPersetujuanKadisPUPR', $id);
    }
    public function revisiPersetujuanKadisPUPR($id)
    {
        $this->emit('handleOpenModalRevisiPersetujuanKadisPUPR', $id);
    }
    public function setujuPersetujuanKadisPUPR($id)
    {
        $this->emit('handleOpenModalSetujuPersetujuanKadisPUPR', $id);
    }

    // penomoran surat
    public function beriNomorSuratDanTanggal($id)
    {
        $this->emit('handleOpenModalBeriNomorSuratDanTanggal', $id);
    }

    // upload scan surat rekomendasi
    public function uploadScanSuratRekomendasi($id)
    {
        $this->emit('handleOpenModalUploadScanSuratRekomendasi', $id);
    }

    // ubah status pengajuan
    public function ubahStatusPengajuan($id)
    {
        $this->emit('handleOpenModalUbahStatusPengajuan', $id);
    }

    // generate surat pernyataan
    public function generateSuratPernyataan($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateSuratPernyataan($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    public function hapusSuratPernyataan($id)
    {
        $pemohon = Pengajuan::find($id);

        $pemohon->surat_pernyataan = null;

        $pemohon->save();
        unlink(storage_path('app/pengajuan/'.$id.'/Surat Pernyataan - ' . $pemohon->nama_lengkap . '.pdf'));
    }

    public function hapusSKPR($id)
    {
        $pemohon = Pengajuan::find($id);

        $pemohon->surat_permohonan_skpr = null;

        $pemohon->save();
        unlink(storage_path('app/pengajuan/'.$id.'/Surat Permohonan SKPR - ' . $pemohon->nama_lengkap . '.pdf'));
    }


    public function hapusTKPRD($id)
    {
        $pemohon = Pengajuan::find($id);

        $pemohon->surat_permohonan_tkprd = null;

        $pemohon->save();
        unlink(storage_path('app/pengajuan/'.$id.'/Surat Permohonan TKPRD - ' . $pemohon->nama_lengkap . '.pdf'));
    }

    public function hapusRekom($id)
    {
        $pemohon = Pengajuan::find($id);

        $pemohon->surat_permohonan_tkprd = null;

        $pemohon->save();
        unlink(storage_path('app/pengajuan/'.$id.'/Surat Rekomendasi - ' . $pemohon->nama_lengkap . '.pdf'));
    }


    // generate surat permohonan skpr
    public function generateSuratPermohonanSKPR($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateSuratPermohonanSKPR($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            dd($e);
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // generate surat permohonan skpr
    public function generateSuratPermohonanTKPRD($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateSuratPermohonanTKPRD($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // generate berita acara
    public function generateBeritaAcara($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateBeritaAcara($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // generate dokumentasi
    public function generateDokumentasi($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateFileDokumentasi($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // generate nota dinas
    public function generateNotaDinas($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateNotaDinas($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }

    // generate surat rekomendasi
    public function generateSuratRekomendasi($id)
    {
        try {
            $path = 'pengajuan/' . $id;
            SuratGenerator::generateSuratRekomendasi($id, $path);
            $this->alert('success', 'Berhasil mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        } catch (\Exception $e) {
            $this->alert('warning', 'Gagal mengenerate surat', [
                'timerProgressBar' => true,
            ]);
        }
    }
}
