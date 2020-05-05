<?php
    // include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\header.php');
?>
@extends('layouts.app')
@section('content')

<h3> Update Post </h3>

<form action="/cms_laravel/cms_laravel/public/post/update/{{$post->id}}" method="POST">
@csrf
    <div class='form-group'>
        <label for='title'>Title</label>
        <input type = "text" name="post_title" class='form-control' placeholder='{{$post->title}}' 
            required/>
    </div>
    <div class='form-group'>
        <label for='body'>Body</label>
        <input type='text' name="post_body" class='form-control' placeholder='{{$post->body}}' 
            required/>
    </div>
    <button class='btn btn-primary'> Update </button>

</form>

<?php
    // include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\footer.php');
?>
@endsection
