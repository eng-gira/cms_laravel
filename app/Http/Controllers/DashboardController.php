<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        
        $posts = Post::where('user_id', $auth_id)->orderBy('created_at','desc')->get();        

        $data = ['posts'=>$posts];

        if(auth()->user()->admin)
        {
            $moderators = User::where('mod', '1')->get();
            $data['moderators']=$moderators;
            
            return view('dashboard')->with('data', $data);
        }

        return auth()->user()->mod ? view('dashboard')->with('data', $data) : redirect('/')->
        with('error', 'Unauthorized Access');
    }

    public function settings()
    {
        return view('settings');
    }

    //Upload
    public function upload(Request $request)
    {
        $result = $request->file("image_testing")->storeOnCloudinary();

        $pathOnCloudinary = $result->getPath();

        echo "path is $pathOnCloudinary <br>";
        // $toUpdate = User::find(auth()->user()->id);

        // $toUpdate->name = $toUpdate->name . " && image: $pathOnCloudinary";

        // $toUpdate->save();
        
    }
}
