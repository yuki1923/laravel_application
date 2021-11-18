<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('post.index');
    }
}
