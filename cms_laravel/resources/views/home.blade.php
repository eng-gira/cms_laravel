@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div id='content'>
                    @if(count($posts)>0)
                        @foreach($posts as $post)
                            <div id="post_{{$post->id}}" class='post_area'>
                                <div class='post_title'>{{$post->title}}</div>
                                <div class='post_body'>{{$post->body}}</div>
                            </div>
                        @endforeach
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
