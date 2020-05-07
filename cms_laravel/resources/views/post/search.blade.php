@extends('layouts.app')
@section('content')
<?php $posts = $data['posts']; $authors=$data['authors']; $count_search_res=$data['count_search_res'];?>
<div id='content' style='padding:10px;'>
    @if(count($posts)>0)
        <h5 id="count_search_res">Number of search results: {{$count_search_res}}</h5><br><br>
        @foreach($posts as $post)
            <h2 class="post_title">{{$post->title}}</h2>
            <div class="post_created_at" style="display:inline-block">{{$post->created_at}}</div>
            <div class="post_author" style="display:inline-block">by <b>{{$authors[$post->id]}}</b></div>
            <h4 class="post_body">{{$post->body}}</h4><br><br>
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
            <br><hr><br>
        @endforeach
    @endif
</div>
@endsection