<?php

namespace App\Http\Controllers;

use App\Models\Lamapelayanan;
use Illuminate\Http\Request;

class LamaPelayananController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $data = Lamapelayanan::all();
        return view('kelola_lama_pelayanan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'lamapelayanan' => 'required',
        ]);

        $tambah_lama_pelayanan = Lamapelayanan::create($request->all());
        return redirect()->back()->with('sukses', 'Lama Pelayanan Berhasil Ditambahkan !!!');
    }
}
