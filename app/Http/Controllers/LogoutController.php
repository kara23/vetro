<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index() {

    }

    public function logout() {
        return redirect('/')->with(Auth::logout());
    }
}
