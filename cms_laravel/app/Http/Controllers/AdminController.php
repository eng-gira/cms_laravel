<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function hire_moderator($selected_user_id)
    {

    }

    public function update_privileges($moderator_id)
    {

    }

    public function fire_moderator($moderator_id)
    {

    }

    public function force_delete_user($user_id)
    {

    }
}
