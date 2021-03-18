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

        // Diketahui
        $lambda = Antrian::where('estimasi', '<=', '17:00:00')->get()->count(); // 15
        $c = Loketpelayanan::all()->count(); // 4
        $miu = Lamapelayanan::first()->lamapelayanan; // 04:36
        // return $miuperjam = date('H:i:s', strtotime($miu) * 4);
        // return $formatmiuperjam = number_format($miuperjam, 2);

        // Rumus Rasio Pelayanan
        $rasio_bawah = date('i.s', strtotime($miu) * $c); // 18,24
        // return $rasio_bawah * 2;
        $rasio = $lambda / ($rasio_bawah);
        $hasil_rasio = number_format($rasio, 2);
        if ($hasil_rasio >= 1) {
            $hasil_rasio = 1;
        } else {
            $hasil_rasio == $hasil_rasio;
        }
        $hasil_rasio; // 0.82
        $persen_rasio = round($hasil_rasio * 100 / 1, 2);
        $hasil_persen_rasio = $persen_rasio . "%";

        // Rumus Probabilitas loket pelayanan yang menganggur
        $p0 = (1 - $hasil_rasio); // 0.18
        $tp0 = $p0 * 60; // 10.8
        $hasil_tp0 = $tp0 . " menit";

        // Rumus Rata-rata jumlah masyarakat/orangnya yang menunggu di layani
        $angka = 1;
        $faktorial = 1;
        while ($angka <= $c) {
            $faktorial = $faktorial * $angka;
            $angka = $angka + 1;
        }
        $faktorial;

        // return pow(5, 3); *penggunaan perhitungan pangkat 5 pangkat 3
        $format_miuu = date('s.i', strtotime($miu) / 60);
        $bagi_lambdadanmiu = $lambda / $format_miuu;
        $format_bagi_lambdadanmiu = number_format($bagi_lambdadanmiu, 2);
        $dalamkurung = pow($format_bagi_lambdadanmiu, $c);
        $format_dalamkurung = number_format($dalamkurung, 2);
        $atas_lq = $p0 * $dalamkurung * $hasil_rasio;
        $format_atas_lq = number_format($atas_lq, 2);
        $bawah_lq = $faktorial * (pow($p0, 2));
        $format_bawah_lq = number_format($bawah_lq, 2);
        $hasil_lq = $format_atas_lq / $format_bawah_lq;
        $format_lq = number_format($hasil_lq, 2);


        // Rumus waktu rata'' masyarakat dalam antrian (Wq)
        $wq = $format_lq / $lambda;
        $format_wq = number_format($wq, 2);

        // Rumus Rata-rata waktu yang diperlukan masyarakat/orangnya didalam instansi tersebut atau dalam sistem (W)
        $bagiiii = 1 / $format_miuu;
        $format_bagi = number_format($bagiiii, 1);
        $w = $format_wq + $format_bagi;
        $format_w = number_format($w);

        // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
        $L = $lambda * $format_w;
        $format_L = number_format($L);

        return view('mcsp.index', compact('L'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function rasio()
    // {
    //     // $timezone = 'Asia/Jakarta';
    //     // $date = new DateTime('now', new DateTimeZone($timezone));
    //     // $localtime = $date->format('H:i:s');
    //     // $lambda = Antrian::where('estimasi', '<=', '09:00:00')->get();

    //     return view('mcsp.index', compact('lambda'));
    // }

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
