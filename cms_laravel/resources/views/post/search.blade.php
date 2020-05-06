@extends('layouts.app')
@section('content')
    @if(count($posts)>0)
        @foreach($posts as $post)
            <p> {{$post->title}}</p>
            <p> {{$post->body}} </p>
        @endforeach
    @endif
@endsection