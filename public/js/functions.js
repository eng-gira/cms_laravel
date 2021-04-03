

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
        
    xhttp.open("GET", '/post/upvote/'+post_id, true);
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
        
    xhttp.open("GET", '/post/downvote/'+post_id, true);
    xhttp.send();
}
