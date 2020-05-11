@extends('layouts.app')
@section('content')
<?php $posts = $data['posts']; $authors=$data['authors']; $count_search_res=$data['count_search_res'];?>
<div id='content' style='padding:10px;'>
    @if(count($posts)>0)
        <h5 id="count_search_res">Number of search results: {{$count_search_res}}</h5><br><br>
        @foreach($posts as $post)
            <h4 class='post_title'>
                <a href='/cms_laravel/cms_laravel/public/post/show/{{$post->id}}'>
                    {{$post->title}}
                </a>
            </h4>           
            <h6 class="post_created_at" style="display:inline-block">{{$post->created_at}}</h6>
            <h6 class="post_author" style="display:inline-block">by <b>{{$authors[$post->id]}}</b></h6>
            <h5 class="post_body">{{$post->body}}</h5><br><br>
            @if(!Auth::guest())
               @include('inc.post_footer')
            @endif
            <br><hr><br>
        @endforeach
    @endif
</div>
@endsection