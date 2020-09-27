<?php

namespace App\Http\Controllers;
use App\Models\Tmlayanan;
use App\Models\Tmpelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $tmlayanan_count = Tmlayanan::get()->count();
        $tmpelanggan_count = Tmpelanggan::get()->count();

        $date = Carbon::now()->format('d');

        $tmpelanggan = Tmpelanggan::with('tmLayanan')
            ->whereDay('tgl_daftar',$date)->get();
// dd($tmpelanggan->tmLayanan);

        $tot_harga = 0;

        foreach ($tmpelanggan as $key => $value) {
          $tot_harga +=  $value->tmLayanan->harga;
        }




        return view ('welcome', compact('tmlayanan_count', 'tmpelanggan_count','tmpelanggan', 'tot_harga'));

    }
}
