@extends('layouts.app')
@section('content')
    <?php $post = $data[0]; $author=$data[1];?>
    <div id='content' style='padding:10px;'>
        <div class="post_title">{{$post->title}}</div>
        <div class="post_created_at" style="display:inline-block">{{$post->created_at}}</div>
        <div class="post_author" style="display:inline-block">by <b>{{$author}}</b></div>
        <div class="post_body">{{$post->body}}</div><br><br>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/cms_laravel/cms_laravel/public/post/edit/{{$post->id}}" 
                    class="btn btn-primary">Edit</a>
                <form action="/cms_laravel/cms_laravel/public/post/delete/{{$post->id}}" method="POST" 
                style="float:right">
                    @csrf
                    <input type="hidden" name="_method" value="delete"/><!--To make the method=DELETE for routing-->
                    <button class="btn btn-danger"> DELETE </button>
                </form>
            @endif
        @endif
    </div>
@endsection
