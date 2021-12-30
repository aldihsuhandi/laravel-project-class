var load = true;
function loadMore(page)
{
    // console.log("test");
    $.ajax({
        url: '?page=' + page,
        type: 'get',
        error: function(error){
            console.log(error);
        }
    }).done(function(data) {
        console.log(data);
        if(data == "")
        {
            load = false;
            return;
        }

        $("#infinite").append(data);
    });
}

var page = 1;
$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height() && load == true) 
    {
        ++page;
        loadMore(page);
    }
});
