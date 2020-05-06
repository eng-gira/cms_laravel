<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

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



        return redirect('dashboard')->with('success', 'Post Stored');
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

        return redirect('dashboard')->with('success', 'Post Updated');
    }

    public function delete_post($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id) return redirect('dashboard')->with('error', 'Unauthorized Access');
        $post->delete();
        return redirect('dashboard')->with('success', 'Post Deleted');
    }

    public function show_post($id)
    {
        $post = Post::find($id);
        $author = User::find($post->user_id)->name;
    
        return view('post.show')->with('data', [$post, $author]);
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

    public function search(Request $request)
    {
        $for = $request->input('for');
        $posts = Post::where('title','like', '%'.$for.'%')->orWhere('body', 'like', '%'.$for.'%')->get();
        return view('post.search')->with('posts',$posts);
    }
}
