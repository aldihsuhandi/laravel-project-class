function update_trending()
{
    var url = "/post/trending";
    $.ajax({
        url: url,
        type: 'get',
        error: function(error) {
            console.log(error);
        }
    }).done(function(data) {
        console.log(data);
        $("#trending_container").empty();
        $("#trending_container").append(data);
    });
}

function update_post_like(post_id, state, like_count, dislike_count)
{
    var like_button = "#like_button_" + post_id;
    var dislike_button = "#dislike_button_" + post_id;
    var like_counter = "#like_post_" + post_id;
    var dislike_counter = "#dislike_post_" + post_id;

    console.log(state);

    // update counter
    $(like_counter).text(like_count);
    $(dislike_counter).text(dislike_count);

    // update color
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
    
function post_like_handler(post_id, value, csrf_token)
{
    console.log(post_id, value);
    var url = "/post/like";

    $.ajax({
        url: url,
        type: "post",
        data: {
            post_id: post_id,
            value: value,
            _token: csrf_token,
        },
        success: function(response){
            console.log("Success");
            console.log(response);
            update_post_like(
                post_id, 
                response["state"], 
                response["like_count"],
                response["dislike_count"]
            );
            update_trending();
        },
        error: function(error) {
            console.log(error);
        }
    });
}