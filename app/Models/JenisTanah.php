<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTanah extends Model
{
    use HasFactory;

    protected $table = 'jenis_tanah';

    protected $fillable = [
        'jenis_tanah', ' warna'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'jenis_tanah_id');
    }
}
