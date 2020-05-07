<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

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
        $auth_id = auth()->user()->id;
        $can = auth()->user()->admin || auth()->user()->mod;

        $posts = Post::where('user_id', $auth_id)->orderBy('created_at','desc')->get();
        return $can ? view('dashboard')->with('posts', $posts) : redirect('/')->
        with('error', 'Unauthorized Access');
    }

    public function settings()
    {
        return view('settings');
    }
}
