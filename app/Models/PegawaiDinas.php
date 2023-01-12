<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiDinas extends Model
{
    use HasFactory;

    protected $table = 'pegawai_dinas';

    protected $fillable = [
        'jabatan',
        'nama',
        'jabatan_lain',
        'nip',
    ];
}
