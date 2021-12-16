@extends('template.master')

@section('title', 'Homepage')

@section('content')
<div class = "flex flex-col py-5 mx-5 w-3/5 items-center justify-center">
    <div class = "w-full flex justify-between items-end">
        <p class = "text-fg text-xl font-bold">Trending</p>
        <p class = "text-fg">Show all Trending</p>
    </div>
    <div class = "w-full flex flex-row justify-evenly items-center py-2 my-2" id = "trending_container">
        @include('post.cardtemplate')
    </div>
    <div class = "flex flex-row justify-between items-start w-full">
        {{-- post  --}}
        <div class = "w-3/5 mr-3 flex flex-col justify-between items-center">
            {{-- create new post --}}
            <div class = "w-full bg-bg flex flex-row py-1 px-2 my-2 rounded shadow-md items-center">
                <i class = "fas fa-user text-fg p-2 text-xl"></i>
                <a href="/post/new" class = "bg-fg text-grey w-full rounded p-1 mx-1 mr-2">Create a post</a>
            </div>

            {{-- post --}}
            <div class = "flex flex-col justify-center items-center py-2 w-full" id = "infinite">
                <div class = "text-fg text-xl font-bold w-full text-left">Post</div>
                @include('post.template')
            </div>
        </div>
        {{-- category --}}
        <div class = "w-2/5 bg-bg rounded shadow-md ml-3 py-1 my-2">
            <div class = "px-2 pt-2 m-1 text-fg text-2xl font-bold">Categories</div>
            <div class = "flex flex-col justify-center items-center p-2 mx-2">
                @foreach ($categories as $category)
                    <div class = "bg-bgAlt text-fg p-1 m-1 my-2 rounded w-full">{{ $category -> id.". ".$category -> name }}</div>
                @endforeach
            </div>
            <div class = "p-2 text-fg">
                {{--  {{ $categories -> links() }}  --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var load = true;
    function loadMore(page)
    {
        // console.log("test");
        $.ajax({
            url: '?page=' + page,
            type: 'get',
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

    function update_trending()
    {
        var url = "/post/trending";
        $.ajax({
            url: url,
            type: 'get',
        }).done(function(data) {
            console.log(data);
            $("#trending_container").empty();
            $("#trending_container").append(data);
        });
    }

    function update_like(post_id, state, like_count, dislike_count)
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
    
    function like_handler(post_id, value)
    {
        console.log(post_id, value);
        var url = "/post/like";

        $.ajax({
            url: url,
            type: "post",
            data: {
                post_id: post_id,
                value: value,
                _token: "{{ csrf_token() }}",
            },
            success: function(response){
                console.log("Success");
                console.log(response);
                update_like(
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
</script>
@endsection