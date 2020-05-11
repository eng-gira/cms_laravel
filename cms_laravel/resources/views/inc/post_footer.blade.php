@if((Auth::user()->id == $post->user_id) || Auth()->user()->admin)
    @if(Auth::user()->id == $post->user_id)
        <a href="/cms_laravel/cms_laravel/public/post/edit/{{$post->id}}" 
        class="btn btn-primary">Edit</a>
    @endif
    <form action="/cms_laravel/cms_laravel/public/post/delete/{{$post->id}}" method="POST" 
    style="float:right">
        @csrf
        <input type="hidden" name="_method" value="delete"/><!--To make the method=DELETE for routing-->
        <button class="btn btn-danger"> DELETE </button>
    </form>
@endif
@if(Auth::user()->id != $post->user_id)
    @if(in_array(Auth::user()->id, explode(';', $post->up_voters, -1)))
        <h5 id="up_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left" 
            onclick="upvote({{$post->id}})">Upvoted</h5>
    @else
        <h5 id="up_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left" 
            onclick="upvote({{$post->id}})">Upvote</h5>
    @endif    
    @if(in_array(Auth::user()->id, explode(';', $post->down_voters, -1)))
        <h5 id="down_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left;margin-left:50px" 
            onclick="downvote({{$post->id}})">Downvoted</h5>
    @else
        <h5 id="down_vote_el_of_post_{{$post->id}}" style="cursor:pointer;float:left;margin-left:50px" 
            onclick="downvote({{$post->id}})">Downvote</h5>
    @endif
@endif

<script>
    function upvote(post_id)
    {
        let up_vote_el = document.getElementById("up_vote_el_of_post_"+post_id);
        let down_vote_el = document.getElementById("down_vote_el_of_post_"+post_id);

        let xhttp = new XMLHttpRequest;

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = xhttp.responseText;
                up_vote_el.innerHTML = response;
                
                if(response.includes('Upvoted')) down_vote_el.innerHTML='Downvote';
            }
        };
            
        xhttp.open("GET", '/cms_laravel/cms_laravel/public/post/upvote/'+post_id, true);
        xhttp.send();
    }

    function downvote(post_id)
    {
        let down_vote_el = document.getElementById("down_vote_el_of_post_"+post_id);
        let up_vote_el = document.getElementById("up_vote_el_of_post_"+post_id);
        
        let xhttp = new XMLHttpRequest;

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = xhttp.responseText;
                down_vote_el.innerHTML = response;

                if(response.includes('Downvoted')) up_vote_el.innerHTML = 'Upvote';
            }
        };
            
        xhttp.open("GET", '/cms_laravel/cms_laravel/public/post/downvote/'+post_id, true);
        xhttp.send();
    }
</script>