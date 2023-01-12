<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_landing extends Model
{
    protected $table = 'setting_landing';

    protected $fillable = [
        'key',
        'value',
        'gambar',
    ];
}
