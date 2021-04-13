<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Laporan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $antrian = Laporan::all();
        // $data1 = [];
        // $data2 = [];
        foreach ($antrian as $hari) {
            $data1 = $hari->where('hari', 'Senin')->get()->count();
            $data2 = $hari->where('hari', 'Selasa')->get()->count();
            $data3 = $hari->where('hari', 'Rabu')->get()->count();
            $data4 = $hari->where('hari', 'Kamis')->get()->count();
            $data5 = $hari->where('hari', 'Jumat')->get()->count();
        }
        // dd($data1);
        // $laporan = Laporan::all();
        return view('home', compact('data1', 'data2', 'data3', 'data4', 'data5'));
    }
}
