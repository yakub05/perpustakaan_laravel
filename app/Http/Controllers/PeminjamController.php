<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Cart;
use App\Models\User;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjam = Peminjam::groupBy('user_id')->get()->map(function ($p) {
            $b = User::where('id', $p->user_id)->first();
            $pp = Peminjam::where('user_id', $p->user_id)->get('buku_id')->map(function ($x) {
                return $x->buku_id;
            })->toArray();
            $a = Buku::whereIn('id', $pp)->get();
            return array_merge($p->toArray(), ['user' => $b->toArray(),'buku' => $a->toArray()]);
        })->toArray();
        return view('peminjam', ['peminjam' => $peminjam]);
    }

    public function add(Request $request)
    {
        $carts = Cart::all();
        foreach ($carts as $c) {
            Peminjam::create([
                'buku_id' => $c->buku_id,
                'user_id' => auth()->user()->id,
            ]);
        }
        foreach ($carts as $c) {
            $c->delete();
        }

        return redirect()->back()->with('success', 'Book added to cart');
    }
}
