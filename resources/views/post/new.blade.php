<?php
    // include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\header.php');
?>
@extends('layouts.app')
@section('content')

    <h3 style="padding:10px"> New Post </h3>

    <form style="padding:10px" action="/post/store" method="POST"> 
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
        // include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\footer.php');
    ?>
@endsection
