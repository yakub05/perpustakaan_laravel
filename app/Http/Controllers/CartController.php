<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::get()->map(function ($c) {
            $b = Buku::where('id', $c->buku_id)->first();
            return array_merge($c->toArray(), ['buku' => $b->toArray()]);
        });
        // dd($carts);
        $title = 'Hapus Daftar Buku!';
        $text = "Apa kamu yakin ingin melupakan aku?";
        confirmDelete($title, $text);
        return view('cart', ['carts' => $carts]);
    }

    public function add(Request $request)
    {
        $book = Buku::find($request->id);
        $v = $request->validate([
            "buku_id" => "required"
        ]);

        Cart::create($v);
        return redirect()->back()->with('toast_success', 'Buku ditambahkan di keranjang');
    }

    public function destroy($id)
    {
        $c = Cart::findOrFail($id);
        $c->delete();
        return redirect()->back()->with('info', 'Data Berhasil Dihapus');
    }

}
