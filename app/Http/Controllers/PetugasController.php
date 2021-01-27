<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordPetugas;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PetugasController extends Controller
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

    public function index()
    {
        $data = Petugas::all();
        return view('kelola_petugas_loket.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->validate($request, [
            'NIP' => 'required|min:16|max:18|unique:kepala_bagian',
            'username' => 'required|unique:users|max:20',
            'name' => 'required|max:25',
            'email' => 'required|max:25|unique:users|email',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = 'Kepala Bagian';
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->save();

        $k_bagian = new Petugas();
        $request->request->add(['user_id' => $user->id]);
        $tambah_k_bagian = Petugas::create($request->except(['email' => $request->email]));

        return redirect()->back()->with('sukses', 'Data Berhasil di Simpan !!!');
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
        $user = User::find($id)->delete();
        $k_bagian = Petugas::where('user_id', $id)->first()->delete();

        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus !!!');
    }

    public function resetpasswordpetugas($id)
    {
        $data = User::find($id);
        $data->password = bcrypt('rahasiakita');
        $data->update();
        Mail::to($data->email)->send(new ResetPasswordPetugas($data));

        return redirect()->back()->with('sukses', 'Password Sudah Dikirim ke Email Petugas !!!');
    }
}
