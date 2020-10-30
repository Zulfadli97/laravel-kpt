<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;

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
}
