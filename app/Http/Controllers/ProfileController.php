<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myProfile()
    {
        // get current auth user
        $user = auth()->user();

        // return to view with user
        // resources/views/profile/my-profile.blade.php
        return view('profile.my-profile', compact('user'));
    }
}
