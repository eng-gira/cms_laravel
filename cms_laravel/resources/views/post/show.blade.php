@extends('layouts.app')
@section('content')
    <div id='content'>
        <div class='post_title'>{{$post->title}}</div>
        <div class='post_body'>{{$post->body}}</div>
    </div>
@endsection
