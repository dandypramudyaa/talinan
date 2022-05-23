<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanBanjir extends Model
{
    protected $table = "laporan_banjir";

    protected $fillable = [
        'tanggal_bencana',
        'waktu_bencana',
        'alamat_bencana',
        'jumlah_rumah_terkena_banjir',
        'jumlah_korban_luka_berat',
        'jumlah_korban_luka_ringan',
        'foto',
        'user_id',
        'status'
    ];
}
