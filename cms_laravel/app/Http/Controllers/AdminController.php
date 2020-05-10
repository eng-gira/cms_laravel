<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function hire_moderator($selected_user_id)
    {
        if(!auth()->user()->admin)
        {
            return redirect('dashboard')->with('error', 'Unauthorized Access');
        }

        $new_mod = User::find($selected_user_id);

        $new_mod->mod = 1;
        $new_mod->save();

        return redirect('/dashboard')->with('success', 'Operation Successful');
    }

    public function fire_moderator($moderator_id)
    {
        if(!auth()->user()->admin)
        {
            return redirect('dashboard')->with('error', 'Unauthorized Access');
        }
        
        $fired_mod = User::find($moderator_id);

        $fired_mod->mod = 0;
        $fired_mod->save();

        return redirect('/dashboard')->with('success', 'Operation Successful');
    }

    public function show_all_users()
    {
        if(!auth()->user()->admin)
        {
            return redirect('dashboard')->with('error', 'Unauthorized Access');
        }

        $all_users = User::all();
        $data['all_users'] = $all_users;
        
        return view('admin.all_users')->with('data', $data);
    }

    public function force_delete_user($user_id)
    {
        if(!auth()->user()->admin)
        {
            return redirect('dashboard')->with('error', 'Unauthorized Access');
        }
        
        $user_to_del = User::find($user_id);
        $user_to_del->delete();

        return redirect('/dashboard')->with('success', 'Operation Successful');
    }
}
