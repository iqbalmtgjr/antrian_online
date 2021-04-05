<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\Lamapelayanan;
use App\Models\Loketpelayanan;

class LamapelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = Lamapelayanan::all();
        $loket = Loketpelayanan::all();
        if ($request->waktu_awal != null && $request->waktu_akhir != null ) {
            $laporan = Laporan::whereBetween('tgl_antrian', [$request->waktu_awal, $request->waktu_akhir])->where('lamapelayanan_id', $request->lamapelayanan_id)->get();
        } elseif ($request->waktu_awal != null && $request->waktu_akhir == null){
            $laporan = Laporan::where('tgl_antrian', $request->waktu_awal)->where('lamapelayanan_id', $request->lamapelayanan_id)->get();
        } elseif ($request->waktu_awal == null && $request->waktu_akhir != null){
            $laporan = Laporan::where('tgl_antrian', $request->waktu_akhir)->where('lamapelayanan_id', $request->lamapelayanan_id)->get();
        } elseif ($request->waktu_awal == null && $request->waktu_akhir == null){
            $laporan = Laporan::where('lamapelayanan_id', $request->lamapelayanan_id)->get();
        } else {
            $laporan = Laporan::where('lamapelayanan_id', $request->lamapelayanan_id)->get();
        }
        
        return view('kelola_lama_pelayanan.index', compact('data', 'laporan', 'loket'));
    }

    // public function filter_lamapelayanan(Request $request)
    // {
    //     if ($request->waktu_awal != null && $request->waktu_akhir != null ) {
    //         $laporan = Laporan::whereBetween('tgl_antrian', [$request->waktu_awal, $request->waktu_akhir])->get();
    //     } else {
    //         $laporan = Laporan::all();
    //     }
    //     dd($laporan);
    //     return view('kelola_lamapelayanan.index', compact('laporan'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lamapelayanan' => 'required',
        ]);

        $tambah_lama_pelayanan = Lamapelayanan::create($request->all());
        // dd($tambah_lama_pelayanan);
        return redirect()->back()->with('sukses', 'Lama Pelayanan Berhasil Ditambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'lamapelayanan' => 'required',
        ]);

        // dd($request->id);
        $update = Lamapelayanan::find($request->id)->update($request->except([$request->url_getdata]));
        return redirect()->back()->with('sukses', 'Lama Pelayanan Berhasil Update !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $delete = Lamapelayanan::find($id)->delete();
        return redirect()->back()->with('sukses', 'Loket Berhasil Dihapus !!!');
    }

    public function getdata($id)
    {
        $dataa = Lamapelayanan::find($id);
        return $dataa;
    }
}
