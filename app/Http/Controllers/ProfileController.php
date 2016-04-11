<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('name', $username)->first();
        $profile = Profile::where('user_id', $user->id)->first();

        if(!$user) {
            about(404);
        }
        return view('profile.index')->with('user', $user)->with('profile', $profile);
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'alpha|max:50',
            'location' => 'alpha|max:10'
            ]);

        Auth::user()->update([
            'name' => $request->input('name'),
            ]);

        Auth::user()->profile->update([
            'location' => $request->input('location'),
            ]);

        return redirect()->route('profile.edit')->with('info', 'Your profile has been updated');
    }
}
