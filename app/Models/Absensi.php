<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'absen_masuk',
        'absen_keluar',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
