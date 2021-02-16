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
        $data = Antrian::all();
        // foreach ($data as $data) {
        //     $data->lamapelayanan;
        // }
        // $count = Antrian::all()->last();
        // $hitung = date('H:i:s', strtotime($data->waktu_awal_antrian) + strtotime($data->lamapelayanan->lamapelayanan));
        return view('loket_antrian.antrian_a', compact('data'));
    }

    public function reset_antrian_a()
    {
        $antrian_all = Antrian::all();
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
        return view('loket_antrian.antrian_b');
    }

    public function antrian_c()
    {
        return view('loket_antrian.antrian_c');
    }

    public function antrian_d()
    {
        return view('loket_antrian.antrian_d');
    }

    public function pelayanan_a()
    {
        return view('loket_pelayanan.pelayanan_a');
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

    public function store(Request $request)
    {
        $antrii = Antrian::all();
        $antri = $antrii->count() + 1;

        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $hari = $date->format('D');
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $pelayanan = 1;
        $lamapelayanan = 1;
        // dd($pelayanan);
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
            ]);
        } else {
            $antrian = Antrian::create([
                'id_pelayanan' => $pelayanan,
                'lamapelayanan_id' => $lamapelayanan,
                'id_user' => auth()->user()->id,
                'waktu_awal_antrian' => $localtime,
                'tgl_antrian' => $tanggal,
                'hari' => $hari_ini,
                'no_antrian' => $antri,
            ]);
            $last = Antrian::get()->last();
            $last_count = $last->no_antrian - 1;
            $antriann = Antrian::where('no_antrian', $last_count)->first();
            $antriann->update([
                'lama_pelayanan' => date(strtotime($antriann->waktu_akhir_antrian) - strtotime($antriann->waktu_awal_antrian)),
                'waktu_akhir_antrian' => $last->waktu_awal_antrian
            ]);

            // dd($antriann);
        }



        // dd($antrian);

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
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
