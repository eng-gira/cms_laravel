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
        return view('post.new');
    }

    public function store_post(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('post_title');
        $post->body = $request->input('post_body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('dashboard');
    }

    public function edit_post($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id != $post->user_id) return redirect('dashboard');

        return view('post.edit')->with('post', $post);
    }

    public function update_post(Request $request, $id)
    {
        //if (!admin && !mod) goHome;
        
        $post = Post::find($id);

        $post->title=$request->input('post_title');
        $post->body=$request->input('post_body');
        $post->save();

        return redirect('dashboard');
    }

    public function delete_post($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id) return redirect('dashboard');
        $post->delete();
        return redirect('dashboard');
    }

    public function show_post($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post', $post);
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
