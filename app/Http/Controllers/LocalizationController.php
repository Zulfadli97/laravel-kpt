<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        // set application locale to $locale
        app()->setLocale($locale);

        // set session locale to $locale
        session()->put('locale', $locale);

        // return redirect back
        return redirect()->back();
    }
}
