<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView(){
        return view('screens.auth.web.register');
    }

    function register(Request $request) {
        // dd($request->all(),$request);
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'sometimes',
            'email' => 'email|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ]);

        dd($validated);
    }

}
