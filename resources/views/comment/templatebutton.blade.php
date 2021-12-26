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

@if (
    Auth::check() &&
    Auth::user() -> id == $comment -> user -> id
)
    <div onclick="comment_edit_mode({{ $comment -> id }})" class = "text-fg cursor-pointer flex flex-row items-center justify-center pr-4 mx-1 mt-2" id = "edit_comment_{{ $comment -> id }}">
        <i class = "fas fa-pen"></i>
    </div>

    <form action="/post/{{ $post -> id }}/comment/delete" method = "post">
        <input type="hidden" name="comment_id" value = "{{ $comment -> id }}">
        <button class = "text-fg cursor-pointer flex flex-row items-center justify-center pr-4 mx-1 mt-2"">
            <i class = "fas fa-trash"></i>
        </a>
    </form>
    
@endif