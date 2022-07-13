<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function index(){

    }

    public function getPost($id){
        if (Auth::check()) {
            $post = DB::select('select *, id as post_id from posts where id=?', [$id]);
            return view('edit')->with(['post' => $post]);
        } else{
            return view('login');
        }

       
    }

    public function updatePost(Request $request){
            $post = $request->post;
            $post_id = $request->post_id;
            
            if (!$request->filled('post')) {
                return redirect('edit/'.$post_id)->with(['error_msg' => 'The post field is required.']);
            } else{
                DB::table('posts')
                    ->where('id', $post_id)
                    ->update(['post' => $post]);
                return redirect('create')->with(['success_msg' => 'Post successfully updated!']);
            }

        
    }
}
