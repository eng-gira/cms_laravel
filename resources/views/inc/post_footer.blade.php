@if((Auth::user()->id == $post->user_id) || Auth()->user()->admin)
    @if(Auth::user()->id == $post->user_id)
        <a href="/post/edit/{{$post->id}}" 
        class="btn btn-primary">Edit</a>
    @endif
    <form action="/post/delete/{{$post->id}}" method="POST" 
    style="float:right">
        @csrf
        <input type="hidden" name="_method" value="delete"/><!--To make the method=DELETE for routing-->
        <button class="btn btn-danger"> DELETE </button>
    </form>
@endif
@if(Auth::user()->id != $post->user_id)
    @if(in_array(Auth::user()->id, explode(';', $post->up_voters, -1)))
        <h5 id="up_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left" 
            onclick="upvote({{$post->id}})"><b>Upvoted</b></h5>
    @else
        <h5 id="up_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left" 
            onclick="upvote({{$post->id}})">Upvote</h5>
    @endif    
    @if(in_array(Auth::user()->id, explode(';', $post->down_voters, -1)))
        <h5 id="down_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left;margin-left:50px" 
            onclick="downvote({{$post->id}})"><b>Downvoted</b></h5>
    @else
        <h5 id="down_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left;margin-left:50px" 
            onclick="downvote({{$post->id}})">Downvote</h5>
    @endif
@endif
