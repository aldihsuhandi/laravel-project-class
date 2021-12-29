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
        $(like_button).css("color", "#8be9fd");
        $(dislike_button).css("color", "#ffffff");
    }
    else if(state == "dislike")
    {
        $(like_button).css("color", "#ffffff");
        $(dislike_button).css("color", "#8be9fd");
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
        error: function(xhr, error) {
            console.log(error);
            // console.log(xhr.status);
            if(xhr.status == 401)
            {
                window.open('/login', "_self");
            }
        }
    });
}

function post_edit_mode(post_id)
{
    var post = "#post_view_" + post_id;
    var form = "#post_form_" + post_id;

    $(post).hide();
    $(form).show();
}

function post_display_mode(post_id)
{
    var post = "#post_view_" + post_id;
    var form = "#post_form_" + post_id;

    $(post).show();
    $(form).hide();
}

function get_post(post_id)
{
    var url = "/post/get";

    var form_id = "post_edit_" + post_id;
    var form = document.forms[form_id];

    var title = "#post_title_" + post_id;
    var category = "#post_category_" + post_id;
    var description = "#post_description_" + post_id;

    $.ajax({
        url: url,
        type: 'get',
        data: {
            post_id: post_id,
        },
        success: function(response) {
            console.log(response);
            $(title).text(response["title"]);
            $(category).text(response["category"]);
            $(description).text(response["description"]);

            form["title"].value = response["title"];
            form["description"].value = response["description"];
            form["category"].value = response["category_id"];
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function cancel_post_update(post_id)
{
    post_display_mode(post_id);
    get_post(post_id);
}

function save_post_update(post_id)
{
    var url = "/post/update";

    var form_id = "post_edit_" + post_id;
    var form = document.forms[form_id];

    $.ajax({
        url: url,
        type: "post",
        data: {
            id: form["id"].value,
            title: form["title"].value,
            category_id: form["category"].value,
            description: form["description"].value,
            _token: form["_token"].value,
        },
        success: function(response) {
            console.log(response);
            get_post(post_id);
            post_display_mode(post_id);
            update_trending();
        },
        error: function(error) {
            console.log(error);
        }
    });
    
}