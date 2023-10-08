<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $primaryKey = 'id_peminjam';
    protected $guarded = [];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_peminjam');
    }
}
