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
        $this->middleware('auth', ['except' => ['show_post', 'search']]);
    }

    public function new_post()
    {        
        $can = auth()->user()->admin || auth()->user()->mod;

        return $can ? view('post.new') : redirect('dashboard')->with('error', 'Unauthorized Access');
    }

    public function store_post(Request $request)
    {
        $auth_id = auth()->user()->id;

        $can = auth()->user()->admin || auth()->user()->mod;
        
        if($can)
        {
            $post = new Post;
            $post->title = $request->input('post_title');
            $post->body = $request->input('post_body');
            $post->user_id = auth()->user()->id;
            $post->save();
        }

        return $can ? redirect('dashboard')->with('success', 'Post Stored'):
            redirect('dashboard')->with('error', 'Unauthorized Access');
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
        if(auth()->user()->id != $post->user_id && !auth()->user()->admin) 
        {
            return redirect('dashboard')->with('error', 'Unauthorized Access');
        }

        $post->delete();
        return redirect('dashboard')->with('success', 'Post Deleted');
    }

    public function show_post($id)
    {
        $post = Post::find($id);

        $author = User::find($post->user_id) ? User::find($post->user_id)->name : 'Deleted';
    
        return view('post.show')->with('data', [$post, $author]);
    }

    /**
     * @todo called once: vote. Twice: remove vote.
     */
    public function upvote_post($id)
    {
        $auth_id = auth()->user()->id;

        $post = Post::find($id);

        $post_up_voters = $post->up_voters;

        $arr_post_up_voters = explode(';', $post_up_voters, -1);

        if(in_array($auth_id, $arr_post_up_voters))
        {
            //removal of upvote
            $post_up_voters = str_replace($auth_id.';', '', $post_up_voters);

            $post->up_voters = $post_up_voters;

            $post->save();

            return 'Upvote';
        }

        else 
        {
            //removal of downvote (if existed) then, upvoting
            $post_down_voters = $post->down_voters;
            
            if(in_array($auth_id, explode(';', $post_down_voters, -1)))
            {
                $post->down_voters = str_replace($auth_id.';', '', $post_down_voters);
            }

            $post->up_voters = $post_up_voters . $auth_id . ';';

            $post->save();

            return '<b>Upvoted</b>';
        }
    }

    /**
     * @todo called once: vote. Twice: remove vote.
     */
    public function downvote_post($id)
    {
        $auth_id = auth()->user()->id;

        $post = Post::find($id);

        $post_down_voters = $post->down_voters;

        $arr_post_down_voters = explode(';', $post_down_voters, -1);

        if(in_array($auth_id, $arr_post_down_voters))
        {
            //removal of downvote
            $post_down_voters = str_replace($auth_id.';', '', $post_down_voters);

            $post->down_voters = $post_down_voters;

            $post->save();

            return 'Downvote';
        }

        else 
        {
            //removal of upvote (if existed) then, downvoting
            $post_up_voters = $post->up_voters;

            if(in_array($auth_id, explode(';', $post_up_voters, -1)))
            {
                $post->up_voters = str_replace($auth_id.';', '', $post_up_voters);
            }

            $post->down_voters = $post_down_voters . $auth_id . ';';

            $post->save();

            return '<b>Downvoted</b>';
        }
    }

    public function search(Request $request)
    {
        $this->validate($request, ['search'=>'required']);
        $search = $request->input('search');
        $posts = Post::where('title','like', '%'.$search.'%')->orWhere('body', 'like', '%'.$search.'%')
        ->get();

        $authors = array();
        if(count($posts)>0)
        {
            foreach($posts as $post)
            {
                $authors[$post->id] = User::find($post->user_id)? 
                    User::find($post->user_id)->name : 'Deleted';
            }
        }

        $count_search_res=count($posts);

        return view('post.search')->with('data', ['posts'=>$posts, 'authors'=>$authors, 
            'count_search_res'=>$count_search_res]);
    }
}
