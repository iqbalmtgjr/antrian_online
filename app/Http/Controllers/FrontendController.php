<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Antrian;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = new DateTime('now');
        $localtime = $date->format('H:i:s');

        if ($request->id_pelayanan == 1 && $request->cari == null) {
            $data = Antrian::where('id_pelayanan', 1)->paginate(10);
        } elseif ($request->id_pelayanan == null && $request->cari == null) {
            $data = Antrian::orderBy('id_pelayanan', 'asc')->orderBy('no_antrian', 'asc')->paginate(10);
        } elseif ($request->id_pelayanan != null && $request->cari != null) {
            $data = Antrian::where('no_antrian', $request->cari)->where('id_pelayanan', $request->id_pelayanan)->paginate(10);
        } elseif ($request->id_pelayanan == 2) {
            $data = Antrian::where('id_pelayanan', 2)->paginate(10);
        } elseif ($request->id_pelayanan == 3) {
            $data = Antrian::where('id_pelayanan', 3)->paginate(10);
        } elseif ($request->id_pelayanan == 4) {
            $data = Antrian::where('id_pelayanan', 4)->paginate(10);
        } elseif ($request->has('cari')) {
            $data = Antrian::where('no_antrian',  $request->cari)->paginate(10);
        } else {
            $data = Antrian::orderBy('id_pelayanan', 'asc')->orderBy('no_antrian', 'asc')->paginate(10);
        }


        return view('frontend.index', compact('data', 'localtime'));
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
