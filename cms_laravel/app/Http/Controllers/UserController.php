<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update_user()
    {
        $to_update = auth()->user()->id;
    }

    public function delete_user()
    {
        $to_delete = auth()->user()->id;
    }

    public function quit_moderation()
    {
        $to_quit = auth()->user()->id;
    }
}
