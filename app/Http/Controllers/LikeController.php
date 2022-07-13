<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function index() {

    }

    public function like($id) {
        if (!Auth::check()) {
            return redirect("login");
        }
         else{
            $user_id = Auth::user()->id;
            $post_id = $id;

        $check = DB::table('likes')
                ->select('user_id', 'post_id')
                ->where('user_id', '=', [$user_id])
                ->where('post_id', '=', [$post_id])
                ->first();

        if($check !== null) {
            DB::table('likes')
            ->where('user_id', '=', [$user_id])
            ->where('post_id', '=', [$post_id])
            ->delete();

        } else{

            $like = new Like;
            $like->user_id = $user_id;
            $like->post_id = $post_id;
            $like->save();

        }

        return redirect("create");
    }
    }
}
