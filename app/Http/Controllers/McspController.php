<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Antrian;
use App\Models\Lamapelayanan;
use App\Models\Loketpelayanan;
use Illuminate\Http\Request;

class McspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $localtime = $date->format('H:i:s');

        // Rumus Rasio Pelayanan
        $lambda = Antrian::where('estimasi', '<=', '17:00:00')->get()->count();
        $c = Loketpelayanan::all()->count();
        $miu = Lamapelayanan::first()->lamapelayanan;
        $menit_miu = $lambda / ($miu * $c * 60);
        $hasil = number_format($menit_miu, 2);
        $persen_rasio = round($hasil * 100 / 1, 2);
        $hasil_persen_rasio = $persen_rasio . "%";



        // Rumus Probabilitas loket pelayanan yang menganggur
        $p0 = 1 - $hasil;
        $tp0 = $p0 * 60;
        $tp0_format = date('H:i:s', $p0 * 60);
        $persen_p0 = round($tp0 * 100 / 1, 2);


        // Rumus Rata-rata jumlah masyarakat/orangnya yang menunggu di layani

        return view('mcsp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rasio()
    {
        // $timezone = 'Asia/Jakarta';
        // $date = new DateTime('now', new DateTimeZone($timezone));
        // $localtime = $date->format('H:i:s');
        // $lambda = Antrian::where('estimasi', '<=', '09:00:00')->get();

        return view('mcsp.index', compact('lambda'));
    }

    public function create()
    {
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
