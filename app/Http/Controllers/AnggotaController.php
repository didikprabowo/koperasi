<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('id','DESC')->paginate(4);
        return view('anggota/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new User();
		$data->name = $request->name;
		$data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        if($data->save()){
            Session::flash('message', 'Data Anggota Berhasil Di Simpan'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        return redirect()->route('anggota.index');
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
        $user = User::find($id);
		return view('anggota.edit', compact('user'));
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
       // Simpan Edit Siswa
        $user = User::find($id);
		$user->name = $request->name;
		$user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
		$user->save();
        if($user->save()){
            Session::flash('message', 'Data Anggota Berhasil Di Perbarui'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // delete
        $user = User::find($id);
        if($user->delete()){
            Session::flash('message', 'Data Anggota Berhasil Di Hapus'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        return redirect()->route('anggota.index');
    }
}
