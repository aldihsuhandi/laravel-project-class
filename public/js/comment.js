function comment_like_handler(post_id, comment_id, value, csrf_token)
{
    var url = "/post/" + post_id + "/comment/like";
    $.ajax({
        url: url,
        type: "post",
        data: {
            comment_id: comment_id,
            value: value,
            _token: csrf_token,
        },
        success: function(response) {
            console.log("Success");
            console.log(response);
            update_comment_like(
                comment_id,
                response["state"],
                response["like_count"],
                response["dislike_count"],
            );
        },
        error: function(xhr, error) {
            console.log(xhr.status);
            if(xhr.status == 401) 
            {
                window.open('/login', '_self');
            }
        }
    });
}

function update_comment_like(comment_id, state, like_count, dislike_count) 
{
    var like_button = "#like_comment_" + comment_id;
    var dislike_button = "#dislike_comment_" + comment_id;

    var like_counter = "#likecounter_comment_" + comment_id;
    var dislike_counter = "#dislikecounter_comment_" + comment_id;

    console.log(state);
    console.log(like_counter);
    console.log(dislike_counter);

    $(like_counter).text(like_count);
    $(dislike_counter).text(dislike_count);
    
    if(state == "like")
    {
        $(like_button).css("color", "#5E81AC");
        $(dislike_button).css("color", "#ffffff");
    }
    else if(state == "dislike")
    {
        $(like_button).css("color", "#ffffff");
        $(dislike_button).css("color", "#5E81AC");
    }
    else 
    {
        $(like_button).css("color", "#ffffff");
        $(dislike_button).css("color", "#ffffff");
    }
}