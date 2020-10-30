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

    public function updateProfile(Request $request)
    {
        // save to db
        $user = auth()->user();
        $user->NAME = $request->NAME;
        $user->USERGROUPCODE = $request->USERGROUPCODE;
        $user->CREATEDDATE = $request->CREATEDDATE;
        $user->NIRC = $request->NIRC;
        $user->EMAIL = $request->EMAIL;
        $user->TELNO = $request->TELNO;
        $user->save();

        // return to my profile
        return redirect()->to('my-profile')->with('status', 'Successfully update your profile');
    }
}
