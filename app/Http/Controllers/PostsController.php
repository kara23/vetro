<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index() {
        $posts = DB::table("users")
        ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select(DB::raw('(select count(*) from likes where post_id=posts.id) as likes'), "posts.id as post_id", "name", "post", "users.id as user_id", DB::raw('date_format(posts.created_at, "%d %b, %H:%i") as date'))
            ->orderByDesc('posts.id')
            ->get();

        return view('posts.index', ['posts' => $posts]);
    }
}
