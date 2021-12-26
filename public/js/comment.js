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

function comment_edit_mode(comment_id)
{
    var description = "#comment_description_" + comment_id;
    var form = "#comment_edit_" + comment_id;

    $(description).hide();
    $(form).show();
}

function comment_display_mode(comment_id) 
{
    var description = "#comment_description_" + comment_id;
    var form = "#comment_edit_" + comment_id;

    $(form).hide();
    $(description).show();
}

function update_comment(form_id)
{
    var form = document.forms[form_id];
    var csrf_token = form["_token"].value;
    var comment_id = form["comment_id"].value;
    var post_id = form["post_id"].value;
    var description = form["comment"].value;

    var url = "/post/" + post_id + "/comment/update";
    var description_id = "#comment_description_" + comment_id;
    var error_id = "#comment_error_" + comment_id;

    $.ajax({
        url: url,
        type: "post",
        data: {
            description: description,
            comment_id: comment_id,
            _token: csrf_token,
        },
        error: function(xhs, error) {
            // console.log(xhs.status);
            if(xhs.status == 422) 
            {
                $(error_id).show();
                $(error_id).text("* Comment cannot be empty!");
            }
        },
        success: function(response) {
            console.log(response);
            $(description_id).text(description);
            comment_display_mode(comment_id);

            $(error_id).hide();
            $(error_id).text("");
        }
    });
}

function cancel_update(form_id)
{
    var form = document.forms[form_id];
    var csrf_token = form["_token"].value;
    var comment_id = form["comment_id"].value;
    var post_id = form["post_id"].value;

    var error_id = "#comment_error_" + comment_id;
    var url = "/post/" + post_id +  "/comment/get";

    $(error_id).hide();
    $(error_id).text("");

    $.ajax({
        url: url,
        type: "post",
        data: {
            comment_id: comment_id,
            _token: csrf_token,
        },
        success: function(data) {
            form["comment"].value = data;
        },
        error: function(error) {
            console.log(error);
        }
    });
    comment_display_mode(comment_id);
}
