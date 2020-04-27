<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newPost()
    {

    }

    public function storePost(Request $request)
    {

    }

    public function editPost($id)
    {

    }

    public function updatePost(Request $request, $id)
    {

    }

    public function deletePost($id)
    {

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
