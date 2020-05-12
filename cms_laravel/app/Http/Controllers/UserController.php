<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update_user_name()
    {
        if(!isset($_POST['name'])) return redirect('/settings')->with('error', 'Name field empty');
        $new_name = $_POST['name'];

        $users = User::all();

        foreach($users as $user)
        {
            if($user->name==$new_name) return redirect('/settings')->with('error', 'Name already exists');
        }

        $to_update = User::find(auth()->user()->id);

        $to_update->name = $new_name;

        $to_update->save();

        return redirect('/')->with('success', 'Name updated');
    }

    public function update_user_email()
    {
        if(!isset($_POST['email'])) return redirect('/settings')->with('error', 'Email field empty');
        
        $new_email = $_POST['email'];

        $users = User::all();

        foreach($users as $user)
        {
            if($user->email==$new_email) return redirect('/settings')->with('error', 'Email already exists');
        }

        $to_update = User::find(auth()->user()->id);

        $to_update->email = $new_email;

        $to_update->save();

        return redirect('/')->with('success', 'Email updated');
    }

    public function delete_user()
    {
        $to_delete = User::find(auth()->user()->id);
        
        if($to_delete->admin) return redirect('/settings')->with('error', 'Admin Can not Be Delete');
        
        $to_delete->delete();

        return redirect('/')->with('success', 'Account deleted');
    }

    public function quit_moderation()
    {
        $to_quit = User::find(auth()->user()->id);

        if(!$to_quit->mod) return redirect('/settings')->with('error', 'Unauthorized Access');

        $to_quit->mod=0;

        $to_quit->save();

        return redirect('/')->with('success', 'No longer a moderator');
    }
}
