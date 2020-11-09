<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

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

        if ($request->hasFile('profile_picture')) {
            $filename = 'profile-picture-'.$user->USERID.'-'.date("Y-m-d").'.'.$request->profile_picture->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($request->profile_picture));

            $user->IMAGEFILE = $filename;
            $user->save();
        }

        // return to my profile
        return redirect()->to('my-profile')->with('status', 'Successfully update your profile');
    }

    public function myProfilePassword()
    {
        return view('profile.my-profile-password');
    }

    public function updateProfilePassword(Request $request)
    {
        $user = auth()->user();
        $user->USERPASSWORD = bcrypt($request->password);
        $user->save();

        return redirect()->route('my-profile-password')->with('status', 'Successfully updating password');
    }
}
