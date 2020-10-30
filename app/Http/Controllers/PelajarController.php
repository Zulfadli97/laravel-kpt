<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;

class PelajarController extends Controller
{
    public function index()
    {
        $pelajar = Pelajar::all();

        return view('pelajar.index', compact('pelajar'));
    }
}
