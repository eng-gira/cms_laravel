@extends('layouts.app')
<?php 
    $page_title='Dashboard';
    $posts = $data['posts'];

    // <!--  -->
?>
@section('content')
<div class="container">
    <div id='content'>
        @if(auth()->user()->admin)
            <?php $moderators = $data['moderators'];?>
            @if(count($moderators)>0)
                <div id="moderators_management_area">
                    <h2>Moderators</h2>
                    <br>
                    @foreach($moderators as $moderator)
                        <h5 style="float:left">Name: {{$moderator->name}} </h5>
                        
                        <p style="float:right;margin-left:10px" class="btn btn-danger"
                        onclick="confirmModFire({{$moderator->id}}, '{{$moderator->name}}')">
                            Fire Moderator
                        </p>
                        <br>
                        <br>
                        <hr>
                    @endforeach
                    <br><br>
                </div>
            @endif

            <a href="/cms_laravel/cms_laravel/public/admin/show_all_users" class="btn btn-primary">
                All Users
            </a>
            <br>
            <br>
            <hr>
        @endif

        @if(count($posts)>0)
            <h2>My Posts</h2><br><br>
            @foreach($posts as $post)
                <div id="post_{{$post->id}}" class='post_area'>
                    <!-- <div class='post_cover_photo'>{{$post->cover_photo}}</div> -->
                    <h4 class='post_title'>
                        <a href='/cms_laravel/cms_laravel/public/post/show/{{$post->id}}'>
                            {{$post->title}}
                        </a>
                    </h4>
                    <h6 class="post_created_at" style="display:inline-block">{{$post->created_at}}</h6>
                    <h6 class="post_author" style="display:inline-block">by <b>{{auth()->user()->name}}</b></h6>
                    <!-- <div class='post_body'>{{$post->body}}</div> -->
                    <hr>
                </div>
            @endforeach
        @endif    
    </div>
</div>
@endsection

<script>
    function confirmModFire(moderator_id, moderator_name)
    {
        let conf = confirm("Delete moderator " + moderator_name);

        if(conf==true)
        {
            location.replace("/cms_laravel/cms_laravel/public/admin/fire_moderator/"+moderator_id);
        }  
    }
</script>