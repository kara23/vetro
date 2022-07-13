<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class RegistController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect('create');
        } else{
            return view('register');
        }
       
    }

    public function store(Request $request) {
        $validate = $this->validate($request, [
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:150|unique:users',
            'password' => 'required|string|min:3',
            'username' => 'required|max:50|unique:users',
        ]);


            $users = new Register;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->username = $request->username;
            $users->save();
        

            if(auth()->attempt($validate)){
                return redirect('create');
            }

            
      
    }
}
