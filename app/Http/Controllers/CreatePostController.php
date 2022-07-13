<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreatePostController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('create');
        } else{
            return view('login');
        }
       
    }

    public function store(Request $request) {
        $this->validate($request, [
            'post' => 'required',
            'user_id' => 'required',
        ]);

        $post = new Post;
        $post->user_id = $request->user_id;
        $post->post = $request->post;
        $post->save();
        return redirect('create')->with(['message' => 'Post created successfully!']);
    }

    public function posts() {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = DB::table("users")
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select(DB::raw('(select count(*) from likes where post_id=posts.id) as likes'), DB::raw('(select user_id from likes where user_id='.$user_id.' and post_id=posts.id) as likes_user_id'), "posts.id as post_id", "name", "post", "users.id as user_id", DB::raw('date_format(posts.created_at, "%d %b, %H:%i") as date'))
            ->orderByDesc('posts.id')
            ->get();

        return view('create', ['posts' => $posts]);
        } else{
            return view('login');
        }       
    }

    public function delete($id){
        DB::table('posts')->where('id', '=', [$id])->delete();
        return redirect()->back()->with(['success_msg' => 'Post deleted!']);
    }

    public function getPost($id){
        $post = DB::table('posts')->where('id', '=', [$id])->get();
        return redirect('edit')->with(['post' => $post]);
    }
}
