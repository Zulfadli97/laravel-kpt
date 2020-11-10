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
        $senarai_negeri = Negeri::orderBy('NAMA_NEGERI', 'ASC')->get();

        // return to view with data
        // resources/views/pengurusan/negeri/senarai.blade.php
        return view('pengurusan.negeri.senarai', compact('senarai_negeri'));
    }

    public function lihat(Negeri $negeri)
    {
        // resources/views/pengurusan/negeri/lihat.blade.php
        return view('pengurusan.negeri.lihat', compact('negeri'));
    }

    public function kemaskini(Negeri $negeri, Request $request)
    {
        $this->validate(
            $request,
            [
                // 'KOD_NEGERI' => 'required|unique:NEGERI',
                'NAMA_NEGERI' => 'required|min:5'
            ]
        );

        $negeri->KOD_NEGERI = $request->KOD_NEGERI;
        $negeri->NAMA_NEGERI = $request->NAMA_NEGERI;
        $negeri->save();

        return redirect()->back()->with('status', 'Berjaya mengemaskini data negeri');
    }
}
