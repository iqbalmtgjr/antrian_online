<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Antrian;
use App\Models\Lamapelayanan;
use App\Models\Laporan;
use App\Models\Loketpelayanan;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AntrianController extends Controller
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

    public function antrian_a()
    {
        $data = Antrian::where('id_pelayanan', 1)->get();
        // foreach ($data as $data) {
        //     $data->lamapelayanan;
        // }
        // $count = Antrian::all()->last();
        // $hitung = date('H:i:s', strtotime($data->waktu_awal_antrian) + strtotime($data->lamapelayanan->lamapelayanan));
        return view('loket_antrian.antrian_a', compact('data'));
    }

    public function store_a(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 1)->get();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        // $lama_pelayanan = 180;
        // $lama_pelayanan = strtotime($lama_pelayanan1);
        $antri = $antrii->count() + 1;

        // $timezone = "Asia/Jakarta";
        $date = new DateTime('now');
        $hari = $date->format('D');
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        // dd($localtime);
        // $l_pelayanan = $lama_pelayanan->lamapelayanan;
        $pelayanan = 1;
        $lamapelayanan = 1;
        // dd($localtime);
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        if ($antrii->count() == 0) {
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($localtime) + ($lama_pelayanan * 60))
            ]);
        } else {
            $last = Antrian::where('id_pelayanan', 1)->get()->last();
            // $waktu_awal_antrian = $last->waktu_awal_antrian;
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($last->estimasi) + ($lama_pelayanan * 60))
            ]);
            $last = Antrian::where('id_pelayanan', 1)->get()->last();
            $last_count = $last->no_antrian - 1;
            $antriann = Antrian::where('no_antrian', $last_count)->first();
            $waktu_awal = new DateTime($antriann->waktu_awal_antrian);
            $waktu_akhir = new DateTime($antriann->waktu_akhir_antrian);
            $hitung = $waktu_awal->diff($waktu_akhir);
            $antriann->update([
                'waktu_akhir_antrian' => $last->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S')
            ]);
            // dd($antriann);
        }



        // dd($antrian);

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_a()
    {
        $antrian_all = Antrian::where('id_pelayanan', 1)->get();
        foreach ($antrian_all as $all) {
            $laporan = Laporan::create([
                'id_pelayanan' => $all->id_pelayanan,
                'id_user' => $all->id_user,
                'no_antrian' => $all->no_antrian,
                'hari' => $all->hari,
                'tgl_antrian' => $all->tgl_antrian,
                'waktu_awal_antrian' => $all->waktu_awal_antrian,
                'waktu_akhir_antrian' => $all->waktu_akhir_antrian,
                'lama_pelayanan' => $all->lama_pelayanan,
                'estimasi' => $all->estimasi
            ]);
        }
        $antrian = Antrian::where('id_pelayanan', 1);
        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }

    public function antrian_b()
    {
        $data = Antrian::where('id_pelayanan', 2)->get();
        return view('loket_antrian.antrian_b', compact('data'));
    }

    public function store_b(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 2)->get();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        $antri = $antrii->count() + 1;

        $date = new DateTime('now');
        $hari = $date->format('D');
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $pelayanan = 2;
        $lamapelayanan = 1;
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        if ($antrii->count() == 0) {
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($localtime) + ($lama_pelayanan * 60))
            ]);
        } else {
            $last = Antrian::where('id_pelayanan', 2)->get()->last();
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($last->estimasi) + ($lama_pelayanan * 60))
            ]);
            $last = Antrian::where('id_pelayanan', 2)->get()->last();
            $last_count = $last->no_antrian - 1;
            $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 2)->first();
            $waktu_awal = new DateTime($antriann->waktu_awal_antrian);
            $waktu_akhir = new DateTime($antriann->waktu_akhir_antrian);
            $hitung = $waktu_awal->diff($waktu_akhir);
            $antriann->update([
                'waktu_akhir_antrian' => $last->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S')
            ]);
        }

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_b()
    {
        $antrian_all = Antrian::where('id_pelayanan', 2)->get();
        foreach ($antrian_all as $all) {
            $laporan = Laporan::create([
                'id_pelayanan' => $all->id_pelayanan,
                'id_user' => $all->id_user,
                'no_antrian' => $all->no_antrian,
                'hari' => $all->hari,
                'tgl_antrian' => $all->tgl_antrian,
                'waktu_awal_antrian' => $all->waktu_awal_antrian,
                'waktu_akhir_antrian' => $all->waktu_akhir_antrian,
                'lama_pelayanan' => $all->lama_pelayanan,
                'estimasi' => $all->estimasi
            ]);
        }
        $antrian = Antrian::where('id_pelayanan', 2);
        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }

    public function antrian_c()
    {
        $data = Antrian::where('id_pelayanan', 3)->get();
        return view('loket_antrian.antrian_c', compact('data'));
    }

    public function store_c(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 3)->get();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        $antri = $antrii->count() + 1;

        $date = new DateTime('now');
        $hari = $date->format('D');
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $pelayanan = 3;
        $lamapelayanan = 1;
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        if ($antrii->count() == 0) {
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($localtime) + ($lama_pelayanan * 60))
            ]);
        } else {
            $last = Antrian::where('id_pelayanan', 3)->get()->last();
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($last->estimasi) + ($lama_pelayanan * 60))
            ]);
            $last = Antrian::where('id_pelayanan', 3)->get()->last();
            $last_count = $last->no_antrian - 1;
            $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 3)->first();
            $waktu_awal = new DateTime($antriann->waktu_awal_antrian);
            $waktu_akhir = new DateTime($antriann->waktu_akhir_antrian);
            $hitung = $waktu_awal->diff($waktu_akhir);
            $antriann->update([
                'waktu_akhir_antrian' => $last->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S')
            ]);
        }

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_c()
    {
        $antrian_all = Antrian::where('id_pelayanan', 3)->get();
        foreach ($antrian_all as $all) {
            $laporan = Laporan::create([
                'id_pelayanan' => $all->id_pelayanan,
                'id_user' => $all->id_user,
                'no_antrian' => $all->no_antrian,
                'hari' => $all->hari,
                'tgl_antrian' => $all->tgl_antrian,
                'waktu_awal_antrian' => $all->waktu_awal_antrian,
                'waktu_akhir_antrian' => $all->waktu_akhir_antrian,
                'lama_pelayanan' => $all->lama_pelayanan,
                'estimasi' => $all->estimasi
            ]);
        }
        $antrian = Antrian::where('id_pelayanan', 3);
        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }
    public function antrian_d()
    {
        $data = Antrian::where('id_pelayanan', 4)->get();
        return view('loket_antrian.antrian_d', compact('data'));
    }

    public function store_d(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 4)->get();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        $antri = $antrii->count() + 1;

        $date = new DateTime('now');
        $hari = $date->format('D');
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $pelayanan = 4;
        $lamapelayanan = 1;
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        if ($antrii->count() == 0) {
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($localtime) + ($lama_pelayanan * 60))
            ]);
        } else {
            $last = Antrian::where('id_pelayanan', 4)->get()->last();
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
                'estimasi' => date('H:i:s', strtotime($last->estimasi) + ($lama_pelayanan * 60))
            ]);
            $last = Antrian::where('id_pelayanan', 4)->get()->last();
            $last_count = $last->no_antrian - 1;
            $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 4)->first();
            $waktu_awal = new DateTime($antriann->waktu_awal_antrian);
            $waktu_akhir = new DateTime($antriann->waktu_akhir_antrian);
            $hitung = $waktu_awal->diff($waktu_akhir);
            $antriann->update([
                'waktu_akhir_antrian' => $last->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S')
            ]);
        }

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_d()
    {
        $antrian_all = Antrian::where('id_pelayanan', 4)->get();
        foreach ($antrian_all as $all) {
            $laporan = Laporan::create([
                'id_pelayanan' => $all->id_pelayanan,
                'id_user' => $all->id_user,
                'no_antrian' => $all->no_antrian,
                'hari' => $all->hari,
                'tgl_antrian' => $all->tgl_antrian,
                'waktu_awal_antrian' => $all->waktu_awal_antrian,
                'waktu_akhir_antrian' => $all->waktu_akhir_antrian,
                'lama_pelayanan' => $all->lama_pelayanan,
                'estimasi' => $all->estimasi
            ]);
        }
        $antrian = Antrian::where('id_pelayanan', 4);
        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }

    public function pelayanan_a()
    {
        $data = Antrian::where('id_pelayanan', 1)->get();
        return view('loket_pelayanan.pelayanan_a', compact('data'));
    }

    public function store_pelayanan_a(Request $request)
    {
        $antrian = Antrian::where('id_pelayanan', 1)->where('no_antrian', $request)->first();
        $antrian->delete();
    }

    public function pelayanan_b()
    {
        return view('loket_pelayanan.pelayanan_b');
    }

    public function pelayanan_c()
    {
        return view('loket_pelayanan.pelayanan_c');
    }

    public function pelayanan_d()
    {
        return view('loket_pelayanan.pelayanan_d');
    }

    public function index()
    {
        //
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

    // public function hitung_antrian()
    // {
    //     ;
    // }





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

    public function getdata()
    {
        $dataa = Antrian::all();
        foreach ($dataa as $lama) {
            $antrian = $dataa;
            $lamapelayanan = $lama->lamapelayanan->lamapelayanan;
            // return $lamapelayanan->lamapelayanan;
            return compact('antrian', 'lamapelayanan');
        }
    }
}
