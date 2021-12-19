@forelse ($post -> comment as $comment)
    <div class = "bg-bgAlt shadow-md rounded p-3 m-3 flex flex-col">
        <div class = "flex flex-row justify-start items-center text-fg">
            @if ($post -> user -> profile_img != "")
                <img src="{{ asset($post -> user -> profile_img) }}" alt="">
            @else
                <div class = "flex justify-center items-center rounded-full p-2 border border-fg">
                    <i class = "fas fa-user"></i>
                </div>
            @endif
            <a class = "px-1 text-blueAlt decoration-none"> {{ $post -> user -> username }} </a>
        </div>
        <div class = "px-4 mx-5 py-2 text-fg">
            {{ $comment -> description }}
        </div>
        <div class = "flex flex-row justify-start items-center">
            <div onclick="comment_like_handler({{ $post -> id }}, {{$comment -> id}}, 1, '{{ csrf_token() }}')" class = "
                @if (
                    Auth::check() &&
                    $comment -> like -> where('user_id', Auth::user() -> id) -> first() != NULL &&
                    $comment -> like -> where('user_id', Auth::user() -> id) -> first() -> value == 1
                )
                    text-blue
                @else
                    text-fg 
                @endif
                cursor-pointer flex flex-row items-center justify-center pr-4 mx-1" id = "like_comment_{{ $comment-> id }}">
                <p class = "mt-2" id = "likecounter_comment_{{$comment -> id}}">{{ $comment -> like -> where('value', '1') -> count() }} </p>
                <i class = "p-1 fas fa-thumbs-up"></i>
            </div>
            <div onclick="comment_like_handler({{$post -> id}}, {{$comment -> id}}, -1, '{{ csrf_token() }}')" class = "
                @if (
                    Auth::check() &&
                    $comment -> like -> where('user_id', Auth::user() -> id) -> first() != NULL &&
                    $comment -> like -> where('user_id', Auth::user() -> id) -> first() -> value == -1
                )
                    text-blue
                @else
                    text-fg 
                @endif
                cursor-pointer flex flex-row items-center justify-center pr-4 mx-1" id = "dislike_comment_{{ $comment -> id }}">
                <p class = "mt-2" id = "dislikecounter_comment_{{$comment -> id}}">{{ $comment -> like -> where('value', '-1') -> count() }} </p>
                <i class = "p-1 mt-2 fas fa-thumbs-down"></i>
            </div>
        </div>
    </div>
@empty
    <div class = "w-full text-fg font-bold text-3xl text-center pb-5">
        <p>There is no comment</p>
    </div>
@endforelse