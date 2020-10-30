<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->group == 'KPT') {
            // query KPT users
            $users = User::where('USERGROUPCODE', '=', 'KPT')->get();
        } else {
            // query all user from db using model
            $users = User::all();
        }
        
        // return to viw with users
        //resources/views/user/index.blade.php
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // resources/views/user/show.blade.php
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->NAME = $request->NAME;
        $user->USERGROUPCODE = $request->USERGROUPCODE;
        $user->CREATEDDATE = $request->CREATEDDATE;
        $user->NIRC = $request->NIRC;
        $user->EMAIL = $request->EMAIL;
        $user->TELNO = $request->TELNO;
        $user->save();

        // return to my profile
        return redirect()->route('user.show', $user)->with('status', 'Successfully update your profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
