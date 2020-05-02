<?php
    // include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\header.php');
?>
@extends('layouts.app')
@section('content')

<h3> New Post </h3>

<form action="/cms_laravel/cms_laravel/public/post/store" method="POST">
 @csrf   
    <div class='form-group'>
        <label for='title'>Title</label>
        <input type = "text" name="post_title" class='form-control' placeholder='Title' required/>
    </div>
    <div class='form-group'>
        <label for='body'>Body</label>
        <input type='text' name="post_body" class='form-control' placeholder='Body' required/>
    </div>
    <button class='btn btn-primary'> Submit </button>

</form>

<?php
    include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\footer.php');
?>
@endsection
