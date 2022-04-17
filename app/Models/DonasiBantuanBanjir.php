<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiBantuanBanjir extends Model
{
    protected $table = "bantuan_dana_banjir";

    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir',
        'nomor_nik',
        'alamat',
        'jumlah_anggota_keluarga',
        'kerusakan_rumah',
        'penghasilan',
        'anggota_keluarga_yang_terkena_penyakit',
        'foto',
    ];
}
