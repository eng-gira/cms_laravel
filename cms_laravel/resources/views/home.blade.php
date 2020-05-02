@extends('layouts.app')
<?php include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\header.php');?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->

                <div id='content'>
                    @if(count($posts)>0)
                        @foreach($posts as $post)
                            <div id="post_{{$post->id}}" class='post_area'>
                                <div class='post_title'>
                                    <a href='/cms_laravel/cms_laravel/public/post/show/{{$post->id}}'>
                                        {{$post->title}}
                                    </a>
                                </div>
                                <!-- <div class='post_body'>{{$post->body}}</div> -->
                                <hr>
                            </div>
                        @endforeach
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
