@extends('layouts.app')
<?php 
    $page_title='Dashboard';
    $posts = $data['posts'];
?>
@section('content')
<div class="container">
    <div id='content'>
        @if(auth()->user()->admin)
            <?php $moderators = $data['moderators'];?>
            <h2 id="mods">Moderators</h2>
            <br>
            @foreach($moderators as $moderator)
                <h5 style="float:left">Name: {{$moderator->name}} </h5>
                
                <a style="float:right;margin-left:10px" class="btn btn-danger" 
                    onclick="confirmModFire({{$moderator->id}})">
                    Fire Moderator
                </a>
                <a style="float:right" class="btn btn-primary" href="">
                    Update Privileges
                </a>
                <br>
                <br>
                <hr>
            @endforeach
            <br><br>
        @endif

        @if(count($posts)>0)
            <h2>My Posts</h2><br><br>
            @foreach($posts as $post)
                <div id="post_{{$post->id}}" class='post_area'>
                    <!-- <div class='post_cover_photo'>{{$post->cover_photo}}</div> -->
                    <h4>
                        <a href='/cms_laravel/cms_laravel/public/post/show/{{$post->id}}'>
                            {{$post->title}}
                        </a>
                    </h4>
                    <div class="post_created_at" style="display:inline-block">{{$post->created_at}}</div>
                    <div class="post_author" style="display:inline-block">by <b>{{auth()->user()->name}}</b></div>
                    <!-- <div class='post_body'>{{$post->body}}</div> -->
                    <hr>
                </div>
            @endforeach
        @endif    
    </div>
</div>
@endsection
