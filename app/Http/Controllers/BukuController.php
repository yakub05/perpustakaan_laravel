<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BukuController extends Controller
{
    public function index(Request $request)
{
    $dataBuku = Buku::all();
    // return view('daftarbuku', ['dataBuku' => $dataBuku]);
    $keyword = $request->keyword;
        $dataBuku = Buku::where ('nama_buku', 'LIKE', '%'.$keyword.'%')
        ->orwhere('penulis', 'LIKE', '%'.$keyword.'%')
        ->paginate(8);
        return view('daftarbuku', ['dataBuku' => $dataBuku]);
}
}
