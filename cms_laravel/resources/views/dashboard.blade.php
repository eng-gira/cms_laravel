@extends('layouts.app')
<?php 
    $page_title='Dashboard';
?>
@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <!-- <div class="card"> -->
                <!-- <div class="card-header">Dashboard</div> -->

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
                        <h2>My Posts</h2><br><br>
                        @foreach($posts as $post)
                            <div id="post_{{$post->id}}" class='post_area'>
                                <!-- <div class='post_cover_photo'>{{$post->cover_photo}}</div> -->
                                <h4>
                                    <a href='/cms_laravel/cms_laravel/public/post/show/{{$post->id}}'>
                                        {{$post->title}}
                                    </a>
                                </h4>
                                <div class='post_created_at'>
                                    {{$post->created_at}}
                                </div>
                                <!-- <div class='post_body'>{{$post->body}}</div> -->
                                <hr>
                            </div>
                        @endforeach
                    @endif    
                </div>
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
</div>
@endsection
