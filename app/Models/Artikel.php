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

    protected $appends = [
        'formatted_created_at'
    ];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('j, F Y h:i:s');
    }
}
