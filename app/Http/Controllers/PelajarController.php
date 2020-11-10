<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;
use App\Models\IPT;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BulkPelajarImport;

class PelajarController extends Controller
{
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

        // resources/views/pelajar/show.blade.php
        return view('pelajar.show', compact(['pelajar', 'senarai_ipt']));
    }
}
