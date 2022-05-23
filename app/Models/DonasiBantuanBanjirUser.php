<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiBantuanBanjirUser extends Model
{
    protected $table = "donasi_banjir_users";

    protected $fillable = [
        'donasi_id',
        'user_id',
        'jumlah',
    ];

    protected $appends = [
        'waktu_donasi',
    ];

    public function getWaktuDonasiAttribute()
    {
        return date("d F Y", strtotime($this->created_at));
    }
}
