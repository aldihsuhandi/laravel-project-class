
function comment()
{
    $("#post-slide").css("border-bottom-width", "0px")
    $("#comment-slide").css("border-bottom-width", "1px")
    $("#post").hide()
    $("#comment").show()
}

function post()
{
    $("#post-slide").css("border-bottom-width", "1px")
    $("#comment-slide").css("border-bottom-width", "0px")
    $("#comment").hide()
    $("#post").show()
}