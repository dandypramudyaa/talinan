<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = "articles";

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];
}
