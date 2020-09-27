<?php

namespace App\Http\Controllers;

use App\Models\Tmpelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index(){
        $tmlayanan =DB::table('tmlayanans')->get();
       $tmpelanggan = Tmpelanggan::with('tmLayanan')->get();

       return view ('pelanggan.index', compact('tmpelanggan', 'tmlayanan'));
    }
    public function create(){

        return view ('pelanggan.index', compact('tmlayanan'));
        }

    public function store(Request $request){
        $request->validate([
            'n_pelanggan'=>'required',
            'no_hp'=>'required',
            'tgl_daftar'=>'required',
            'tmlayanan_id'=>'required'
        ]);
      Tmpelanggan::create([
          'n_pelanggan' => $request->n_pelanggan,
          'no_hp' => $request->no_hp,
          'tgl_daftar' => $request->tgl_daftar,
          'tmlayanan_id' => $request->tmlayanan_id,
      ]);


    //   $tmpelanggan =Tmpelanggan::all();
    //   return view ('pelanggan.index', compact('tmpelanggan'));
      return redirect(route('pelanggan.index'))->with('status','Data Berhasil ditambahkan!');


    }

    public function edit($id){
        $tmpelanggan = Tmpelanggan::find($id);
        $tmlayanan =DB::table('tmlayanans')->get();

        return view('pelanggan.form_edit', compact('tmpelanggan', 'tmlayanan'));
    }

    public function update(Request $request, $id){

        $tmpelanggan1 = Tmpelanggan::find($id);

        $request->validate([
            'n_pelanggan'=>'required',
            'no_hp'=>'required',
            'tgl_daftar'=>'required',
            'tmlayanan_id'=>'required'
        ]);

        $tmpelanggan1->update([
            'n_pelanggan' => $request->n_pelanggan,
            'no_hp' => $request->no_hp,
            'tgl_daftar' => $request->tgl_daftar,
            'tmlayanan_id' => $request->tmlayanan_id,
        ]);

        return redirect(route('pelanggan.index'))->with('status','Data Berhasil diubah!');
    }

    public function destroy($id){

        Tmpelanggan::destroy($id);
        return redirect(route('pelanggan.index'))->with('status','Data Berhasil dihapus!');
    }
    public function search(Request $request){
        $tmpelanggan = Tmpelanggan::where('n_pelanggan','like',"%".$request->cari."%")->get();
        return view ('pelanggan.index', compact('tmpelanggan'));
    }
}


