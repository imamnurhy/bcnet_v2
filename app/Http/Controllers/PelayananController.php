<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tmlayanan;
use Illuminate\Support\Facades\DB;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tmlayanan =Tmlayanan::get();
        return view ('pelayanan.index', compact('tmlayanan'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tmlayanan =DB::table('tmlayanans')->get();
        return view ('pelayanan.form', compact('tmlayanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tmlayanan::create([
            'n_layanan' => $request->n_layanan,
            'bandwith' => $request->bandwith,
            'harga' => $request->harga,
        ]);
        $tmlayanan =Tmlayanan::all();
        return view ('pelayanan.index', compact('tmlayanan'));
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
        $tmlayanan = Tmlayanan::find($id);


        return view('pelayanan.form_edit', compact('tmlayanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $tmlayanan1 = Tmlayanan::find($id);


        $tmlayanan1->update([
            'n_layanan' => $request->n_layanan,
            'bandwith' => $request->bandwith,
            'harga' => $request->harga
        ]);

        return redirect(route('pelayanan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tmlayanan::destroy($id);
        return redirect(route('pelayanan.index'));
    }
}
