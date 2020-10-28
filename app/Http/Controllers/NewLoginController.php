<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewLoginController extends Controller
{
    public function loginInterface()
    {
        // return to view with new login ui
        // resources/views/new/login.blade.php
        return view('new.login');
    }
}
