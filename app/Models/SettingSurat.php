<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingSurat extends Model
{
    use HasFactory;

    protected $table = 'setting_surat';

    protected $fillable = [
        'key',
        'value',
    ];
}
