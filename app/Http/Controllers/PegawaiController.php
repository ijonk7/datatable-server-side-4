<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatePegawai;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $list_pegawai = Pegawai::all();

        if($request->ajax()){
            return datatables()->of($list_pegawai)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" value="'.$data->id.'" class="btn btn-primary" data-toggle="modal" onclick="getData(this.value)" data-target="#editModal">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" value="'.$data->id.'" class="btn btn-danger" onclick="deleteData(this.value)">Hapus</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ValidatePegawai $request)
    {        
        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();

        return response()->json($pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pegawai = Pegawai::find($request->input('id'));

        return $pegawai;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePegawai $request)
    {
        $pegawai = Pegawai::find($request->id_pegawai);
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();

        return response()->json($pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pegawai = Pegawai::find($request->id);
        $pegawai->delete();

        return response()->json($pegawai);
    }
}
