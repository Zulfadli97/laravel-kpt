<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = CustomUser::where('USERNAME', $request->ic)->first();
        // Auth::login($user, false);

        if (Hash::check($request->password, $user->USERPASSWORD)) {
            // The passwords match...
            // dd(' match');
        } else {
            dd('No match');
        }
        Auth::login($user, false);

        return redirect()->to('home');
    }
}
