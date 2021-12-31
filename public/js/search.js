var form = document.forms["search"];
var search_bar = form["search"];
var category = form["category"];

function change_search() 
{
    var search = search_bar.value;
    var category_id = category.value;
    var url = "/search";

    $.ajax({
        url: url,
        type: "get",
        data: {
            search: search,
            category: category_id
        },
        success: function(response) {
            $("#search_post").empty();
            $("#search_post").append(response);
        },
        error: function(xhs, error) {
            console.log(xhs.status);
            console.log(error);
        }
    });

    console.log(search);
    console.log(category_id);
}

category.onchange = function() {
    change_search();
};
