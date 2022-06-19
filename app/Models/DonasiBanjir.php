<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiBanjir extends Model
{
    protected $table = "donasi_banjir";

    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'no_kk',
        'no_rekening',
        'nama_bank',
        'alamat',
        'no_telepon',
        'parah_kerusakan_tempat_tinggal',
        'tinggi_banjir',
        'jumlah_anggota_keluarga',
        'korban_jiwa',
        'anggota_keluarga_yang_terkena_penyakit',
        'foto',

        'status',
        'jumlah_yang_diberikan_admin',
    ];
}
