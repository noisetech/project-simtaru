<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual_book extends Model
{
    protected $table = 'manual_book';

    protected $fillable = [
        'judul',
        'dokumen', 
    ];
}
