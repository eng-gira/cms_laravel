@extends('layouts.app')
@section('content')
    <?php $post = $data[0]; $author=$data[1];?>
    <div class="container">
        <div id='content' style='padding:10px;'>
            <h4 class="post_title">{{$post->title}}</h4>
            <h6 class="post_created_at" style="display:inline-block">{{$post->created_at}}</h6>
            <h6 class="post_author" style="display:inline-block">by <b>{{$author}}</b></h6>
            <br>
            <br>
            <h5 class="post_body">{{$post->body}}</h5><br><br>
            @if(!Auth::guest())
                @include('inc.post_footer')
            @endif
        </div>
    </div>
@endsection
