<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user = User::create($validated);

        Auth::login($user);
        if(auth()->check()){
            return redirect()->route('index');
        }
        return redirect()->route('login');

    }

    public function loginView(){
        return view('screens.auth.web.login');
    }

    function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('index');
        }

        return back()->withErrors(provider: [
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

}
