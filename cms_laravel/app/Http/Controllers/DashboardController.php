<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard')->with('posts', $posts);
    }

    public function settings()
    {
        return view('settings');
    }
}
