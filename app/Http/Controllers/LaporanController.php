<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        if ($request->loket_pelayanan == null && $request->tgl_awal && $request->tgl_akhir) {
            $data = Laporan::whereBetween('tgl_antrian', [$request->tgl_awal, $request->tgl_akhir])->get();
        } elseif ($request->tgl_awal != null && $request->tgl_akhir == null && $request->loket_pelayanan == null) {
            $data = Laporan::where('tgl_antrian', $request->tgl_awal)->get();
        } elseif ($request->loket_pelayanan != null && $request->tgl_awal == null && $request->tgl_akhir == null) {
            $data = Laporan::where('id_pelayanan', $request->loket_pelayanan)->get();
        } elseif ($request->loket_pelayanan && $request->tgl_awal && $request->tgl_akhir) {
            $data = Laporan::where('id_pelayanan', $request->loket_pelayanan)->whereBetween('tgl_antrian', [$request->tgl_awal, $request->tgl_akhir])->get();
        } elseif ($request->loket_pelayanan != null && $request->tgl_awal != null && $request->tgl_akhir == null) {
            $data = Laporan::where('id_pelayanan', $request->loket_pelayanan)->where('tgl_antrian', $request->tgl_awal)->get();
        } else {
            $data = Laporan::all();
        }
        // dd($data);

        return view('laporan.index', compact('data'));
    }

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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
