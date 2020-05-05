<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

class PagesController extends Controller
{
    //

    public function main()
    {
        $posts = Post::all();
        $authors_names = array();
        foreach($posts as $post) $authors_names[$post->user_id] = User::find($post->user_id)->name;
        return view('main')->with('data', [$posts, $authors_names]);
    }
    public function about()
    {
        return view('about');
    }
}
