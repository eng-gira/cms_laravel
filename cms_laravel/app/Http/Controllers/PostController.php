<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show_post']]);
    }

    public function new_post()
    {
        //if (!admin && !mod) goHome;
        return view('posts.new');
    }

    public function store_post(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('post_title');
        $post->body = $request->input('post_body');
        $post->save();

        return view('home');
    }

    public function edit_post($id)
    {

    }

    public function update_post(Request $request, $id)
    {

    }

    public function delete_post($id)
    {

    }

    public function show_post($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * @todo called once: vote. Twice: remove vote.
     */
    public function upvote_post($id)
    {

    }

    /**
     * @todo called once: vote. Twice: remove vote.
     */
    public function downvote_post($id)
    {
        
    }
}
