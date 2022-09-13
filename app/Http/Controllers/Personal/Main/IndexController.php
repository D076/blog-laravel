<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function __invoke()
    {
        $user_id = auth()->user()->id;

        $data['likesCount'] = DB::table('post_user_likes')->where('user_id', $user_id)->count();
        $data['commentsCount'] = DB::table('comments')->where('user_id', $user_id)->count();

        return view('personal.main.index', compact('data'));
    }
}
