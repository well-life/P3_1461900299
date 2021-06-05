<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('siswa')->get();
        return view('siswa0299' , ['siswa' => $siswa]);
    }
    public function create()
    {
        return view('create_siswa0299');
    }

    public function store(Request $request)
    {
        $nama = $request->get('nama');
        $alamat = $request->get('alamat');
        /* Menyimpan data kedalam tabel */
        $save_siswa = new \App\Models\Siswa;
        $save_siswa->nama = $nama;
        $save_siswa->alamat = $alamat;
        $save_siswa->save();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $nama = $request->nama;

        $data = DB::table('tbl_jadwal')
            ->where('setup_kelas.nama_kelas','like',"%".$nama."%")
            ->join('data_guru','tbl_jadwal.id_guru','=','data_guru.id_guru')
            ->join('setup_pelajaran','tbl_jadwal.id_pelajaran','=','setup_pelajaran.id_pelajaran')
            ->join('setup_kelas','tbl_jadwal.id_kelas','=','setup_kelas.id_kelas')
            ->select('tbl_jadwal.id_jadwal','data_guru.nama_guru','setup_pelajaran.nama_pelajaran','setup_kelas.nama_kelas')
            ->get();
        return view('Tampil_Jadwal0299', ['data' => $data]);
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
        print_r($id);exit;
        $siswa = DB::table('siswa')->where('siswa',$id)->get();
        return view('siswa_edit0299',['siswa' => $siswa]);
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
        $sw = \App\Models\Siswa::findOrFail($id);
        $sw->delete();
        return redirect() ->route('/.index');
    }
}
