<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;
        $titles = [];
        foreach ($comments as $comment){
            $titles[$comment->id] = DB::table('posts')->where('id', $comment->post_id)->value('title');
        }
        return view('personal.comment.index', compact('comments', 'titles'));
    }
}
