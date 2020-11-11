<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;
use App\Models\IPT;
use App\Models\Negeri;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BulkPelajarImport;

class PelajarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','user.group']);
    }
    
    public function index()
    {
        $pelajar = Pelajar::all();

        return view('pelajar.index', compact('pelajar'));
    }

    public function importExcel(Request $request)
    {
        // import using excel facade
        Excel::import(new BulkPelajarImport(), $request->file('attachment'));

        // return to view
        return back();
    }

    public function show(Pelajar $pelajar)
    {
        // query all IPT
        $senarai_ipt = IPT::all();
        //dd($senarai_ipt);

        $senarai_negeri = Negeri::all();

        // resources/views/pelajar/show.blade.php
        return view('pelajar.show', compact(['pelajar', 'senarai_ipt', 'senarai_negeri']));
    }

    public function update(Pelajar $pelajar, Request $request)
    {
        $pelajar->Nama = $request->Nama;
        $pelajar->NoKP = $request->NoKP;
        $pelajar->Kod_IPT = $request->Kod_IPT;
        $pelajar->Kod_Negeri_IPT  = $request->Kod_Negeri_IPT;
        $pelajar->save();

        return redirect()->back()->with('status', 'Berjaya kemaskini data pelajar');
    }
}
