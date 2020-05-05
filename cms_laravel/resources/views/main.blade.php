@extends('layouts.app')
@section('content')
    <?php $posts = $data[0]; $authors_names = $data[1];?>
    @if(count($posts)>0)
        <div class="container">
            <h2> All Posts </h2><br><br>
            @foreach($posts as $post)
                    <!-- <div id="content"> -->
                        <div id="post_{{$post->id}}" class='post_area'>
                            <!-- <div class='post_cover_photo'>{{$post->cover_photo}}</div> -->
                            <h4>
                                <a href='/cms_laravel/cms_laravel/public/post/show/{{$post->id}}'>
                                    {{$post->title}}
                                </a>
                            </h4>
                            <div class='post_created_at' style="display:inline-block">
                                {{$post->created_at}}
                            </div>
                            <div class='post_author' style="display:inline-block">
                                by <b>{{$authors_names[$post->user_id]}}</b>
                            </div>
                            <hr>
                        </div>
                    <!-- </div> -->
            @endforeach
        </div>
    @endif
@endsection