<?php

namespace App\Http\Controllers\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Negeri;

class NegeriController extends Controller
{
    public function senarai()
    {
        // query all data from table 'negeri' using model Negeri
        $senarai_negeri = Negeri::all();

        // return to view with data
        // resources/views/pengurusan/negeri/senarai.blade.php
        return view('pengurusan.negeri.senarai', compact('senarai_negeri'));
    }
}
