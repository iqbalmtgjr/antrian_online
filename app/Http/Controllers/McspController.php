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
    public function index(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $localtime = $date->format('H:i:s');

        // -- Loket A -- //
        if ($request->tgl_awal != null && $request->tgl_akhir != null) {
           $lambda = Laporan::where('id_pelayanan', 1)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->whereBetween('tgl_antrian', [$request->tgl_awal, $request->tgl_akhir])->get()->count(); // 15
        } elseif ($request->tgl_awal != null && $request->tgl_akhir == null) {
           $lambda = Laporan::where('id_pelayanan', 1)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->where('tgl_antrian', $request->tgl_awal)->get()->count(); // 15
        } else {
           $lambda = 1;
        }
        
        $c = Petugas::where('loket_pelayanan_id', 1)->get()->count(); // 1
        $miu_awal = Lamapelayanan::first()->lamapelayanan;
        $miu_2 = ((date('i', strtotime($miu_awal))) * 60) + (date('s', strtotime($miu_awal)));
        $miu = 3600 / $miu_2;
        // return $miuperjam = date('H:i:s', strtotime($miu) * 4);
        // return $formatmiuperjam = number_format($miuperjam, 2);

        // Rumus Rasio Pelayanan
        $rasio = $lambda / $miu;
        $hasil_rasio = number_format($rasio, 2);
        $hasil_rasio; // 0.82
        $persen_rasio = round($hasil_rasio * 100 / 1, 2);
        $hasil_persen_rasio = $persen_rasio . "%";

        // Rumus Probabilitas loket pelayanan yang menganggur
        $p0 = (1 - $hasil_rasio); // 0.18
       if($p0 < 0){
        $hasil_tp0 = '0';

        // return pow(5, 3); *penggunaan perhitungan pangkat 5 pangkat 3
        $format_lq = '0';

        // Rumus waktu rata'' masyarakat dalam antrian (Wq)
        $format_wq = '0';

        // Rumus Rata-rata waktu yang diperlukan masyarakat/orangnya didalam instansi tersebut atau dalam sistem (W)
        $w = '0';

        // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
        $format_L = '0';

        $rekomendasi = "Menambah Petugas Pada Loket A";
       }else{
        $tp0 = $p0 * 60; // 10.8
        $hasil_tp0 = $tp0;

        // Rumus Rata-rata jumlah masyarakat/orangnya yang menunggu di layani
        $angka = 1;
        $faktorial = 1;
        while ($angka <= $c) {
            $faktorial = $faktorial * $angka;
            $angka = $angka + 1;
        }
        $faktorial;

        // return pow(5, 3); *penggunaan perhitungan pangkat 5 pangkat 3
        $bagi_lambdadanmiu = $lambda / $miu;
        $format_bagi_lambdadanmiu = number_format($bagi_lambdadanmiu, 2);
        $dalamkurung = pow($format_bagi_lambdadanmiu, $c);
        $format_dalamkurung = number_format($dalamkurung, 2);
        $atas_lq = $p0 * $dalamkurung * $hasil_rasio;
        $format_atas_lq = number_format($atas_lq, 2);
        $bawah_lq = $faktorial * (pow($p0, 2));
        $format_bawah_lq = number_format($bawah_lq, 2);
        $hasil_lq = $format_atas_lq / $format_bawah_lq;
        $format_lq = round($hasil_lq);


        // Rumus waktu rata'' masyarakat dalam antrian (Wq)
        $wq = $format_lq / $lambda;
        $format_wq = number_format($wq, 2);

        // Rumus Rata-rata waktu yang diperlukan masyarakat/orangnya didalam instansi tersebut atau dalam sistem (W)
        $bagiiii = 1 / $miu;
        $format_bagi = number_format($bagiiii, 3);
        $w = $format_wq + $format_bagi;
        // return $format_w = number_format($w, 2);

        // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
        $L = $lambda * $w;
        $format_L = round($L);

        // Rumus Probabilitas jika loket ditambah
        // $p_5_c_atas = pow(($lambda / $format_asli_miu), ($c + 1));
        // $format_p_5_c_atas = number_format($p_5_c_atas, 2);
        // $p_5_c_bawah = $faktorial * (pow($c, (($c + 1)-$c)));
        // $p_5_c = $format_p_5_c_atas / $p_5_c_bawah * $p0;
        // $hasil_p_5_c = number_format($p_5_c, 4);

        if ($tp0 < 3    ) {
            $rekomendasi = "Menambah Petugas Pada Loket A";
        } else {
            $rekomendasi = "Tidak Ada Penambahan Petugas Pada Loket A";
        }
       }
        
        // -- Loket B -- //
        if ($request->tgl_awal != null && $request->tgl_akhir != null) {
            $lambda_b = Laporan::where('id_pelayanan', 2)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->whereBetween('tgl_antrian', [$request->tgl_awal, $request->tgl_akhir])->get()->count(); // 15
        } elseif ($request->tgl_awal != null && $request->tgl_akhir == null) {
            $lambda_b = Laporan::where('id_pelayanan', 2)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->where('tgl_antrian', $request->tgl_awal)->get()->count();
        } else {
            $lambda_b = 1;
         }
         
         $c_b = Petugas::where('loket_pelayanan_id', 2)->get()->count(); // 1
         $miu_awal_b = Lamapelayanan::where('id', 2)->first()->lamapelayanan;
         $miu_2_b = ((date('i', strtotime($miu_awal_b))) * 60) + (date('s', strtotime($miu_awal_b)));
         $miu_b = 3600 / $miu_2_b;
 
         // Rumus Rasio Pelayanan
        //  $rasio_bawah_b = date('i.s', strtotime($miu) * $c); // 18,24
         // return $rasio_bawah * 2;
         $rasio_b = $lambda_b / $miu_b;
         $hasil_rasio_b = number_format($rasio_b, 2);
        //  if ($hasil_rasio_b >= 1) {
        //      $hasil_rasio_b = 0.9;
        //  } else {
        //      $hasil_rasio_b == $hasil_rasio_b;
        //  }
         $hasil_rasio_b; // 0.82
         $persen_rasio_b = round($hasil_rasio_b * 100 / 1, 2);
         $hasil_persen_rasio_b = $persen_rasio_b . "%";
 
         // Rumus Probabilitas loket pelayanan yang menganggur
         $p0_b = (1 - $hasil_rasio_b); // 0.18
         $tp0_b = $p0_b * 60; // 10.8
         $hasil_tp0_b = $tp0_b;
 
         // Rumus Rata-rata jumlah masyarakat/orangnya yang menunggu di layani
         $angka_b = 1;
         $faktorial_b = 1;
         while ($angka_b <= $c_b) {
             $faktorial_b = $faktorial_b * $angka_b;
             $angka_b = $angka_b + 1;
         }
         $faktorial_b;
 
         // return pow(5, 3); *penggunaan perhitungan pangkat 5 pangkat 3
        //  $format_miuu_b = date('H.i', strtotime($miu_b) * 60);
        //  $asli_miu_b = 60 / $format_miuu;
        //  $format_asli_miu_b = number_format($asli_miu_b);
         $bagi_lambdadanmiu_b = $lambda_b / $miu_b;
         $format_bagi_lambdadanmiu_b = number_format($bagi_lambdadanmiu_b, 2);
         $dalamkurung_b = pow($format_bagi_lambdadanmiu_b, $c_b);
         $format_dalamkurung_b = number_format($dalamkurung_b, 2);
         $atas_lq_b = $p0_b * $dalamkurung_b * $hasil_rasio_b;
         $format_atas_lq_b = number_format($atas_lq_b, 2);
         $bawah_lq_b = $faktorial_b * (pow($p0, 2));
         $format_bawah_lq_b = number_format($bawah_lq_b, 2);
         $hasil_lq_b = $format_atas_lq_b / $format_bawah_lq_b;
         $format_lq_b = round($hasil_lq_b);
 
 
         // Rumus waktu rata'' masyarakat dalam antrian (Wq)
         $wq_b = $format_lq_b / $lambda_b;
         $format_wq_b = number_format($wq_b, 2);
 
         // Rumus Rata-rata waktu yang diperlukan masyarakat/orangnya didalam instansi tersebut atau dalam sistem (W)
         $bagiiii_b = 1 / $miu_b;
         $format_bagi_b = number_format($bagiiii_b, 2);
         $w_b = $format_wq_b + $format_bagi_b;
         // return $format_w = number_format($w, 2);
 
         // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
         $L_b = $lambda_b * $w_b;
         $format_L_b = round($L_b);
 
         // Rumus Probabilitas jika loket ditambah
        //  $p_5_c_atas_b = pow(($lambda_b / $format_asli_miu_b), ($c_b + 1));
        //  $format_p_5_c_atas_b = number_format($p_5_c_atas_b, 2);
        //  $p_5_c_bawah_b = $faktorial_b * (pow($c_b, (($c_b + 1)-$c_b)));
        //  $p_5_c_b = $format_p_5_c_atas_b / $p_5_c_bawah_b * $p0_b;
        //  $hasil_p_5_c_b = number_format($p_5_c_b, 4);
 
         if ($p0_b < 0) {
             $rekomendasi_b = "Menambah Petugas Pada Loket B";
         } else {
             $rekomendasi_b = "Tidak Ada Penambahan Petugas Pada Loket B";
         }
         
         // -- Loket C -- //
         if ($request->tgl_awal != null && $request->tgl_akhir != null) {
            $lambda_c = Laporan::where('id_pelayanan', 3)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->whereBetween('tgl_antrian', [$request->tgl_awal, $request->tgl_akhir])->get()->count(); // 15
        } elseif ($request->tgl_awal != null && $request->tgl_akhir == null) {
            $lambda_c = Laporan::where('id_pelayanan', 3)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->where('tgl_antrian', $request->tgl_awal)->get()->count(); // 15 
        } else {
            $lambda_c = 1;
         }
         
         $c_c = Petugas::where('loket_pelayanan_id', 3)->get()->count(); // 1
         $miu_awal_c = Lamapelayanan::where('id', 3)->first()->lamapelayanan; // 00:04:36
         $miu_2_c = ((date('i', strtotime($miu_awal_c))) * 60) + (date('s', strtotime($miu_awal_c)));
         $miu_c = 3600 / $miu_2_c;
 
         // Rumus Rasio Pelayanan
        //  $rasio_bawah_c = date('i.s', strtotime($miu_c) * $c); // 18,24
         // return $rasio_bawah * 2;
         $rasio_c = $lambda_c / ($miu_c);
         $hasil_rasio_c = number_format($rasio_c, 2);
        //  if ($hasil_rasio_c >= 1) {
        //      $hasil_rasio_c = 0.9;
        //  } else {
        //      $hasil_rasio_c == $hasil_rasio_c;
        //  }
         $hasil_rasio_c; // 0.82
         $persen_rasio_c = round($hasil_rasio_c * 100 / 1, 2);
         $hasil_persen_rasio_c = $persen_rasio_c . "%";
 
         // Rumus Probabilitas loket pelayanan yang menganggur
         $p0_c = (1 - $hasil_rasio_c); // 0.18
         $tp0_c = $p0_c * 60; // 10.8
         $hasil_tp0_c = $tp0_c;
 
         // Rumus Rata-rata jumlah masyarakat/orangnya yang menunggu di layani
         $angka_c = 1;
         $faktorial_c = 1;
         while ($angka_c <= $c_c) {
             $faktorial_c = $faktorial_c * $angka_c;
             $angka_c = $angka_c + 1;
         }
         $faktorial_c;
 
         // return pow(5, 3); *penggunaan perhitungan pangkat 5 pangkat 3
        //  $format_miuu_c = date('H.i', strtotime($miu_c) * 60);
        //  $asli_miu_c = 60 / $format_miuu;
        //  $format_asli_miu_c = number_format($asli_miu_c);
         $bagi_lambdadanmiu_c = $lambda_c / $miu_c;
         $format_bagi_lambdadanmiu_c = number_format($bagi_lambdadanmiu_b, 2);
         $dalamkurung_c = pow($format_bagi_lambdadanmiu_c, $c_c);
         $format_dalamkurung_c = number_format($dalamkurung_c, 2);
         $atas_lq_c = $p0_c * $dalamkurung_c * $hasil_rasio_c;
         $format_atas_lq_c = number_format($atas_lq_c, 2);
         $bawah_lq_c = $faktorial_c * (pow($p0_c, 2));
         $format_bawah_lq_c = number_format($bawah_lq_c, 4);
         $hasil_lq_c = $format_atas_lq_c / $format_bawah_lq_c;
         $format_lq_c = round($hasil_lq_c);
 
 
         // Rumus waktu rata'' masyarakat dalam antrian (Wq)
         $wq_c = $format_lq_c / $lambda_c;
         $format_wq_c = number_format($wq_c, 2);
 
         // Rumus Rata-rata waktu yang diperlukan masyarakat/orangnya didalam instansi tersebut atau dalam sistem (W)
         $bagiiii_c = 1 / $miu_c;
         $format_bagi_c = number_format($bagiiii_c, 2);
         $w_c = $format_wq_c + $format_bagi_c;
         // return $format_w = number_format($w, 2);
 
         // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
         $L_c = $lambda_c * $w_c;
         $format_L_c = round($L_c);
 
         // Rumus Probabilitas jika loket ditambah
        //  $p_5_c_atas_c = pow(($lambda_c / $format_asli_miu_c), ($c_c + 1));
        //  $format_p_5_c_atas_c = number_format($p_5_c_atas_c, 2);
        //  $p_5_c_bawah_c = $faktorial_c * (pow($c_c, (($c_c + 1)-$c_c)));
        //  $p_5_c_c = $format_p_5_c_atas_c / $p_5_c_bawah_c * $p0_c;
        //  $hasil_p_5_c_c = number_format($p_5_c_c, 4);
 
         if ($p0_c < 0) {
             $rekomendasi_c = "Menambah Petugas Pada Loket C";
         } else {
             $rekomendasi_c = "Tidak Ada Penambahan Petugas Pada Loket C";
         }

         // -- Loket D -- //
         if ($request->tgl_awal != null && $request->tgl_akhir != null) {
            $lambda_d = Laporan::where('id_pelayanan', 4)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->whereBetween('tgl_antrian', [$request->tgl_awal, $request->tgl_akhir])->get()->count(); // 15
        } elseif ($request->tgl_awal != null && $request->tgl_akhir == null) {
            $lambda_d = Laporan::where('id_pelayanan', 4)->where('waktu_akhir_pelayanan', '<=', '09:00:00')->where('waktu_akhir_pelayanan', '>', '00:00:01')->where('tgl_antrian', $request->tgl_awal)->get()->count(); // 15 
        } else {
            $lambda_d = 1;
         }
         
         $c_d = Petugas::where('loket_pelayanan_id', 4)->get()->count(); // 1
         $miu_awal_d = Lamapelayanan::where('id', 4)->first()->lamapelayanan; // 00:04:36
         $miu_2_d = ((date('i', strtotime($miu_awal_d))) * 60) + (date('s', strtotime($miu_awal_d)));
         $miu_d = 3600 / $miu_2_d;
 
         // Rumus Rasio Pelayanan
        //  $rasio_bawah_d = date('i.s', strtotime($miu) * $c); // 18,24
         // return $rasio_bawah * 2;
         $rasio_d = $lambda_d / ($miu_d);
         $hasil_rasio_d = number_format($rasio_d, 2);
        //  if ($hasil_rasio_d >= 1) {
        //      $hasil_rasio_d = 0.9;
        //  } else {
        //      $hasil_rasio_d == $hasil_rasio_d;
        //  }
        //  $hasil_rasio_d; // 0.82
         $persen_rasio_d = round($hasil_rasio_d * 100 / 1, 2);
         $hasil_persen_rasio_d = $persen_rasio_d . "%";
 
         // Rumus Probabilitas loket pelayanan yang menganggur
         $p0_d = (1 - $hasil_rasio_d); // 0.18
         $tp0_d = $p0_d * 60; // 10.8
         $hasil_tp0_d = $tp0_d;
 
         // Rumus Rata-rata jumlah masyarakat/orangnya yang menunggu di layani
         $angka_d = 1;
         $faktorial_d = 1;
         while ($angka_d <= $c_d) {
             $faktorial_d = $faktorial_d * $angka_d;
             $angka_d = $angka_d + 1;
         }
         $faktorial_d;
 
         // return pow(5, 3); *penggunaan perhitungan pangkat 5 pangkat 3
        //  $format_miuu_d = date('H.i', strtotime($miu_d) * 60);
        //  $asli_miu_d = 60 / $miu_d;
        //  $format_asli_miu_d = number_format($asli_miu_d);
         $bagi_lambdadanmiu_d = $lambda_d / $miu_d;
         $format_bagi_lambdadanmiu_d = number_format($bagi_lambdadanmiu_b, 2);
         $dalamkurung_d = pow($format_bagi_lambdadanmiu_d, $c_d);
         $format_dalamkurung_d = number_format($dalamkurung_d, 2);
         $atas_lq_d = $p0_d * $dalamkurung_d * $hasil_rasio_d;
         $format_atas_lq_d = number_format($atas_lq_d, 2);
         $bawah_lq_d = $faktorial_d * (pow($p0_d, 2));
         $format_bawah_lq_d = number_format($bawah_lq_d, 4);
         $hasil_lq_d = $format_atas_lq_d / $format_bawah_lq_d;
         $format_lq_d = round($hasil_lq_d);
 
 
         // Rumus waktu rata'' masyarakat dalam antrian (Wq)
         $wq_d = $format_lq_d / $lambda_d;
         $format_wq_d = number_format($wq_d, 2);
 
         // Rumus Rata-rata waktu yang diperlukan masyarakat/orangnya didalam instansi tersebut atau dalam sistem (W)
         $bagiiii_d = 1 / $miu_d;
         $format_bagi_d = number_format($bagiiii_d, 2);
         $w_d = $format_wq_d + $format_bagi_d;
         // return $format_w = number_format($w, 2);
 
         // Rumus Rata-rata jumlah masyarakat didalam instansi tersebut (L)
         $L_d = $lambda_d * $w_d;
         $format_L_d = round($L_d);
 
         // Rumus Probabilitas jika loket ditambah
        //  $p_5_d_atas_d = pow(($lambda_d / $format_asli_miu_d), ($c_d + 1));
        //  $format_p_5_c_atas_d = number_format($p_5_d_atas_d, 2);
        //  $p_5_c_bawah_d = $faktorial_d * (pow($c_d, (($c_d + 1)-$c_d)));
        //  $p_5_c_d = $format_p_5_c_atas_d / $p_5_c_bawah_d * $p0_d;
        //  $hasil_p_5_c_d = number_format($p_5_c_d, 4);
 
         if ($p0_d < 0) {
             $rekomendasi_d = "Menambah Petugas Pada Loket D";
         } else {
             $rekomendasi_d = "Tidak Ada Penambahan Petugas Pada Loket D";
         }

         $petugas_a = Petugas::where('loket_pelayanan_id', 1)->first();
         $petugas_b = Petugas::where('loket_pelayanan_id', 2)->first();
         $petugas_c = Petugas::where('loket_pelayanan_id', 3)->first();
         $petugas_d = Petugas::where('loket_pelayanan_id', 4)->first();

         $tgl_rekomendasi = $request->tgl_awal;
         

        return view('mcsp.index', compact(
        'hasil_persen_rasio', 'format_L', 'hasil_tp0', 'format_lq', 'format_wq', 'w',  'rekomendasi', 'petugas_a',
        'hasil_persen_rasio_b', 'format_L_b', 'hasil_tp0_b', 'format_lq_b', 'format_wq_b', 'w_b', 'rekomendasi_b', 'petugas_b',
        'hasil_persen_rasio_c', 'format_L_c', 'hasil_tp0_c', 'format_lq_c', 'format_wq_c', 'w_c', 'rekomendasi_c', 'petugas_c',
        'hasil_persen_rasio_d', 'format_L_d', 'hasil_tp0_d', 'format_lq_d', 'format_wq_d', 'w_d', 'rekomendasi_d', 'petugas_d', 
        'tgl_rekomendasi'
        ));
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
