<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect('create');
        } else{
            return view('login');
        }
        
    }

    public function store(Request  $request) {

        $validation = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($validation)){
            return redirect('create');
        }
        else{
            return redirect('login')->withErrors(['message' => 'Invalid login']);
        }
    }
}
