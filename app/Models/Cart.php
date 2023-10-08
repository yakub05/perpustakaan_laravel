<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded=[

    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id');
    }

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class, 'id_peminjam');
    }
}
