<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        if(!$query) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("email"), 'LIKE', "%{$query}%")->orWhere('name', 'LIKE', "%{$query}%")->get();
        
        return view('search.results')->with('users', $users);
    }
}
