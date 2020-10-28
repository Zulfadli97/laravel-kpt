<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class NewLoginController extends Controller
{
    public function loginInterface()
    {
        // return to view with new login ui
        // resources/views/new/login.blade.php
        return view('new.login');
    }

    public function loginProcess(Request $request)
    {
        // query from db - check user
        $user = User::where('USERNAME', $request->username)->first();

        if ($user) {
            if (Hash::check($request->password, $user->USERPASSWORD)) {
                Auth::login($user, false); // remember_token column
                return redirect()->to('home');
            } else {
                return redirect()->to('new-login');
            }
        }

        return redirect()->to('new-login');
    }
}
