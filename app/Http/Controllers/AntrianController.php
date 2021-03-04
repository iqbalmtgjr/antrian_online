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

    public function antrian_a(Request $request)
    {
        // dd($request->all());
        if ($request->has('cari')) {
            $data = Antrian::where('id_pelayanan', 1)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data = Antrian::where('id_pelayanan', 1)->paginate(10);
        }
        // dd($data);

        // foreach ($data as $data) {
        //     $data->lamapelayanan;
        // }
        // $count = Antrian::all()->last();
        // $hitung = date('H:i:s', strtotime($data->waktu_awal_antrian) + strtotime($data->lamapelayanan->lamapelayanan));
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        return view('loket_antrian.antrian_a', compact('data', 'localtime'));
    }

    public function store_a(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 1)->get();
        $antriii = Antrian::where('id_pelayanan', 1)->get()->last();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        // $lama_pelayanan = 180;
        // $lama_pelayanan = strtotime($lama_pelayanan1);
        if ($antriii == null) {
            $antri = $antrii->count() + 1;
        } else {
            $antri = $antriii->no_antrian + 1;
        }


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
                'estimasi' => date('H:i:s', strtotime($localtime))
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
            $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 1)->first();
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
        // $antrian_all = Antrian::where('id_pelayanan', 1)->get();
        // foreach ($antrian_all as $all) {
        //     $laporan = Laporan::create([
        //         'id_pelayanan' => $all->id_pelayanan,
        //         'id_user' => $all->id_user,
        //         'no_antrian' => $all->no_antrian,
        //         'hari' => $all->hari,
        //         'tgl_antrian' => $all->tgl_antrian,
        //         'waktu_awal_antrian' => $all->waktu_awal_antrian,
        //         'waktu_akhir_antrian' => $all->waktu_akhir_antrian,
        //         'lama_pelayanan' => $all->lama_pelayanan,
        //         'estimasi' => $all->estimasi
        //     ]);
        // }
        $antrian = Antrian::where('id_pelayanan', 1)->delete();
        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }

    public function antrian_b(Request $request)
    {
        if ($request->has('cari')) {
            $data = Antrian::where('id_pelayanan', 2)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data = Antrian::where('id_pelayanan', 2)->paginate(10);
        }
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        return view('loket_antrian.antrian_b', compact('data', 'localtime'));
    }

    public function store_b(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 2)->get();
        $antriii = Antrian::where('id_pelayanan', 2)->get()->last();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        if ($antriii == null) {
            $antri = $antrii->count() + 1;
        } else {
            $antri = $antriii->no_antrian + 1;
        }

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
                'estimasi' => date('H:i:s', strtotime($localtime))
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
        }

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_b()
    {
        $antrian = Antrian::where('id_pelayanan', 2)->delete();
        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }

    public function antrian_c(Request $request)
    {
        if ($request->has('cari')) {
            $data = Antrian::where('id_pelayanan', 3)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data = Antrian::where('id_pelayanan', 3)->paginate(10);
        }
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        return view('loket_antrian.antrian_c', compact('data', 'localtime'));
    }

    public function store_c(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 3)->get();
        $antriii = Antrian::where('id_pelayanan', 3)->get()->last();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        if ($antriii == null) {
            $antri = $antrii->count() + 1;
        } else {
            $antri = $antriii->no_antrian + 1;
        }

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
                'estimasi' => date('H:i:s', strtotime($localtime))
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
        }

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_c()
    {
        $antrian = Antrian::where('id_pelayanan', 3)->delete();
        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }
    public function antrian_d(Request $request)
    {
        if ($request->has('cari')) {
            $data = Antrian::where('id_pelayanan', 4)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data = Antrian::where('id_pelayanan', 4)->paginate(10);
        }
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        return view('loket_antrian.antrian_d', compact('data', 'localtime'));
    }

    public function store_d(Request $request)
    {
        $antrii = Antrian::where('id_pelayanan', 4)->get();
        $antriii = Antrian::where('id_pelayanan', 4)->get()->last();
        $lama_pelayanan = Lamapelayanan::get()->first()->lamapelayanan;
        if ($antriii == null) {
            $antri = $antrii->count() + 1;
        } else {
            $antri = $antriii->no_antrian + 1;
        }

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
                'estimasi' => date('H:i:s', strtotime($localtime))
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
        }

        return redirect()->back()->with('sukses', 'Antrian Sudah Masuk !!!');
    }

    public function reset_antrian_d()
    {
        $antrian = Antrian::where('id_pelayanan', 4)->delete();
        return redirect()->back()->with('sukses', 'Antrian Berhasil Direset !!!');
    }

    public function pelayanan_a(Request $request)
    {

        if (Antrian::where('id_pelayanan', 1)->get()->count() == null) {
            $data = Antrian::where('id_pelayanan', 1);
        } else {
            if ($request->has('cari')) {
                $data = Antrian::where('id_pelayanan', 1)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            } else {
                $data = Antrian::where('id_pelayanan', 1)->paginate(10);
            }
        }
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        $time = date('H:i:s', strtotime($localtime) + (Lamapelayanan::get()->first()->lamapelayanan * 60));
        // dd($time);
        // dd($data);
        return view('loket_pelayanan.pelayanan_a', compact('data', 'localtime', 'time'));
    }

    public function store_pelayanan_a(Request $request)
    {
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        $antrian = Antrian::where('id_pelayanan', 1)->first();
        $first_count = $antrian->no_antrian + 1;
        $antriann = Antrian::where('no_antrian', $first_count)->where('id_pelayanan', 1)->first();
        $waktu_awal = new DateTime($antrian->waktu_awal_antrian);
        $waktu_akhir = new DateTime($antriann->waktu_awal_antrian);
        $lama_pelayanan = $waktu_awal->diff($waktu_akhir);
        $estimasi = new DateTime($antrian->estimasi);
        $kurang = new DateTime($lama_pelayanan->format('%H:%I:%S'));
        $antrian_all = Antrian::where('id_pelayanan', 1)->get();
        $laporan = Laporan::create([
            'id_pelayanan' => $antrian->id_pelayanan,
            'id_user' => $antrian->id_user,
            'no_antrian' => $antrian->no_antrian,
            'hari' => $antrian->hari,
            'tgl_antrian' => $antrian->tgl_antrian,
            'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
            'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
            'lama_pelayanan' => $lama_pelayanan->format('%H:%I:%S'),
            'estimasi' => ($estimasi)->diff($kurang)->format('%H:%I:%S'),
        ]);
        foreach ($antrian_all as $ann) {
            $laporann = Laporan::where('id_pelayanan', 1)->get();
            foreach ($laporann as $lap) {
                # code...
                $w_akhir = new DateTime($lap->lama_pelayanan);
                dd($lap->lama_pelayanan);
            }
            $w_awal = new DateTime($ann->waktu_awal_antrian);
            $l_pelayanan = $w_awal->diff($w_akhir)->format('%H:%I:%S');
            $update = Antrian::where('id_pelayanan', 1)->update([
                'estimasi' => (new DateTime($ann->estimasi))->diff(new DateTime($l_pelayanan))->format('%H:%I:%S'),
            ]);
        }


        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Selanjutnya !!!');
    }

    public function pelayanan_b(Request $request)
    {
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        // dd($localtime);
        if (Antrian::where('id_pelayanan', 2)->get()->count() == null) {
            $data = Antrian::where('id_pelayanan', 2);
        } else {
            if ($request->has('cari')) {
                $data = Antrian::where('id_pelayanan', 2)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            } else {
                $data = Antrian::where('id_pelayanan', 2)->paginate(10);
            }
        }
        // dd($data);
        return view('loket_pelayanan.pelayanan_b', compact('data', 'localtime'));
    }

    public function store_pelayanan_b(Request $request)
    {
        $antrian = Antrian::where('id_pelayanan', 2)->first();
        $last_count = $antrian->no_antrian + 1;
        $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 2)->first();
        $waktu_awal = new DateTime($antrian->waktu_awal_antrian);
        $waktu_akhir = new DateTime($antrian->waktu_akhir_antrian);
        $hitung = $waktu_awal->diff($waktu_akhir);
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        $estimasi = new DateTime($antrian->estimasi);
        $kurang = new DateTime($hitung->format('%H:%I:%S'));
        if ($antrian->estimasi > $localtime) {
            $laporan = Laporan::create([
                'id_pelayanan' => $antrian->id_pelayanan,
                'id_user' => $antrian->id_user,
                'no_antrian' => $antrian->no_antrian,
                'hari' => $antrian->hari,
                'tgl_antrian' => $antrian->tgl_antrian,
                'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
                'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S'),
                'estimasi' => ($estimasi)->diff($kurang)->format('%H:%I:%S'),
                // 'estimasi' => date('H:i:s', strtotime($antrian->estimasi) - strtotime($hitung->format('%H:%I:%S')))
            ]);
        } else {
            $laporan = Laporan::create([
                'id_pelayanan' => $antrian->id_pelayanan,
                'id_user' => $antrian->id_user,
                'no_antrian' => $antrian->no_antrian,
                'hari' => $antrian->hari,
                'tgl_antrian' => $antrian->tgl_antrian,
                'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
                'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S'),
                'estimasi' => $antrian->estimasi
            ]);
        }

        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Selanjutnya !!!');
    }

    public function pelayanan_c(Request $request)
    {
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        // dd($localtime);
        if (Antrian::where('id_pelayanan', 3)->get()->count() == null) {
            $data = Antrian::where('id_pelayanan', 3);
        } else {
            if ($request->has('cari')) {
                $data = Antrian::where('id_pelayanan', 3)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            } else {
                $data = Antrian::where('id_pelayanan', 3)->paginate(10);
            }
        }
        // dd($data);
        return view('loket_pelayanan.pelayanan_c', compact('data', 'localtime'));
    }

    public function store_pelayanan_c(Request $request)
    {
        $antrian = Antrian::where('id_pelayanan', 3)->first();
        $last_count = $antrian->no_antrian + 1;
        $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 3)->first();
        $waktu_awal = new DateTime($antrian->waktu_awal_antrian);
        $waktu_akhir = new DateTime($antrian->waktu_akhir_antrian);
        $hitung = $waktu_awal->diff($waktu_akhir);
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        $estimasi = new DateTime($antrian->estimasi);
        $kurang = new DateTime($hitung->format('%H:%I:%S'));
        if ($antrian->estimasi > $localtime) {
            $laporan = Laporan::create([
                'id_pelayanan' => $antrian->id_pelayanan,
                'id_user' => $antrian->id_user,
                'no_antrian' => $antrian->no_antrian,
                'hari' => $antrian->hari,
                'tgl_antrian' => $antrian->tgl_antrian,
                'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
                'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S'),
                'estimasi' => ($estimasi)->diff($kurang)->format('%H:%I:%S'),
                // 'estimasi' => date('H:i:s', strtotime($antrian->estimasi) - strtotime($hitung->format('%H:%I:%S')))
            ]);
        } else {
            $laporan = Laporan::create([
                'id_pelayanan' => $antrian->id_pelayanan,
                'id_user' => $antrian->id_user,
                'no_antrian' => $antrian->no_antrian,
                'hari' => $antrian->hari,
                'tgl_antrian' => $antrian->tgl_antrian,
                'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
                'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S'),
                'estimasi' => $antrian->estimasi
            ]);
        }

        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Selanjutnya !!!');
    }

    public function pelayanan_d(Request $request)
    {
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        // dd($localtime);
        if (Antrian::where('id_pelayanan', 4)->get()->count() == null) {
            $data = Antrian::where('id_pelayanan', 4);
        } else {
            if ($request->has('cari')) {
                $data = Antrian::where('id_pelayanan', 4)->where('no_antrian', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            } else {
                $data = Antrian::where('id_pelayanan', 4)->paginate(10);
            }
        }
        // dd($data);
        return view('loket_pelayanan.pelayanan_d', compact('data', 'localtime'));
    }

    public function store_pelayanan_d(Request $request)
    {
        $antrian = Antrian::where('id_pelayanan', 4)->first();
        $last_count = $antrian->no_antrian + 1;
        $antriann = Antrian::where('no_antrian', $last_count)->where('id_pelayanan', 4)->first();
        $waktu_awal = new DateTime($antrian->waktu_awal_antrian);
        $waktu_akhir = new DateTime($antrian->waktu_akhir_antrian);
        $hitung = $waktu_awal->diff($waktu_akhir);
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');
        $estimasi = new DateTime($antrian->estimasi);
        $kurang = new DateTime($hitung->format('%H:%I:%S'));
        if ($antrian->estimasi > $localtime) {
            $laporan = Laporan::create([
                'id_pelayanan' => $antrian->id_pelayanan,
                'id_user' => $antrian->id_user,
                'no_antrian' => $antrian->no_antrian,
                'hari' => $antrian->hari,
                'tgl_antrian' => $antrian->tgl_antrian,
                'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
                'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S'),
                'estimasi' => ($estimasi)->diff($kurang)->format('%H:%I:%S'),
                // 'estimasi' => date('H:i:s', strtotime($antrian->estimasi) - strtotime($hitung->format('%H:%I:%S')))
            ]);
        } else {
            $laporan = Laporan::create([
                'id_pelayanan' => $antrian->id_pelayanan,
                'id_user' => $antrian->id_user,
                'no_antrian' => $antrian->no_antrian,
                'hari' => $antrian->hari,
                'tgl_antrian' => $antrian->tgl_antrian,
                'waktu_awal_antrian' => $antrian->waktu_awal_antrian,
                'waktu_akhir_antrian' => $antriann->waktu_awal_antrian,
                'lama_pelayanan' => $hitung->format('%H:%I:%S'),
                'estimasi' => $antrian->estimasi
            ]);
        }

        $antrian->delete();

        return redirect()->back()->with('sukses', 'Antrian Selanjutnya !!!');
    }

    public function mcsp()
    {
        return view('mcsp.index');
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

    public function laporan(Request $request)
    {
        $data = Laporan::all();
        return view('laporan.index', compact('data'));
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
