<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Antrian;
use App\Models\Laporan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Models\Lamapelayanan;
use App\Models\Loketpelayanan;

class McspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loket_a(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $localtime = $date->format('H:i:s');

        // Diketahui
        if ($request->loket_a != null) {
           $lambda = Laporan::where('estimasi', '<=', '17:00:00')->where('hari', $request->loket_a)->get()->count(); // 15
        } else {
            $lambda = 1;
        }
        
        $c = Petugas::where('loket_pelayanan_id', 1)->get()->count(); // 1
        $miu = Lamapelayanan::first()->lamapelayanan; // 00:04:36
        // return $miuperjam = date('H:i:s', strtotime($miu) * 4);
        // return $formatmiuperjam = number_format($miuperjam, 2);

        // Rumus Rasio Pelayanan
        $rasio_bawah = date('i.s', strtotime($miu) * $c); // 18,24
        // return $rasio_bawah * 2;
        $rasio = $lambda / ($rasio_bawah);
        $hasil_rasio = number_format($rasio, 2);
        if ($hasil_rasio >= 1) {
            $hasil_rasio = 0.9;
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
        $format_miuu = date('H.i', strtotime($miu) * 60);
        $asli_miu = 60 / $format_miuu;
        $format_asli_miu = number_format($asli_miu);
        $bagi_lambdadanmiu = $lambda / $format_asli_miu;
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
        $bagiiii = 1 / $format_asli_miu;
        $format_bagi = number_format($bagiiii, 2);
        $w = $format_wq + $format_bagi;
        // return $format_w = number_format($w, 2);

        // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
        $L = $lambda * $w;
        // $format_L = number_format($L, );

        // Rumus Probabilitas jika loket ditambah
        $p_5_c_atas = pow(($lambda / $format_asli_miu), ($c + 1));
        $format_p_5_c_atas = number_format($p_5_c_atas, 2);
        $p_5_c_bawah = $faktorial * (pow($c, (($c + 1)-$c)));
        $p_5_c = $format_p_5_c_atas / $p_5_c_bawah * $p0;
        $hasil_p_5_c = number_format($p_5_c, 4);

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
