<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        # Все посты по 4 штуки - сначала новые
        $posts = Post::orderBy('updated_at', 'desc')->paginate(4);
        # Три случайных поста - сначала новые
        $randomPosts = Post::orderBy('updated_at', 'desc')->get()->random(3);
        # Четыре самых пролайканных поста
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get()->take(4);
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
