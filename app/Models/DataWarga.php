<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataWarga extends Model
{
    protected $table = "data_warga";

    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'no_rekening',
        'nama_bank',
        'alamat',
        'no_telepon',
    ];
}
