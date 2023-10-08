<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'Bukus';
    protected $fillable = [
        'nama_buku',
        'tahun_terbit',
        'penulis',
    ];

     protected $primaryKey = 'id';

       public function cart()
       {
           return $this->belongsToMany(Cart::class, 'id');
       }
}
