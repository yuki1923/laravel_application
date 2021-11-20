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

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        //投稿者以外が編集ボタンを押した場合はホーム画面にリダイレクトさせる
        if ($post->user_id !== Auth::id()) {
            return redirect('/');
        }
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            return redirect('/');
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect('/');
    }
}
