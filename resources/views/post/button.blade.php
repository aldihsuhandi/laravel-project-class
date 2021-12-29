<div onclick="post_like_handler({{$post -> id}}, 1, '{{ csrf_token() }}')" class = "
    @if (
        Auth::check() &&
        $post -> like -> where('user_id', Auth::user() -> id) -> first() != NULL &&
        $post -> like -> where('user_id', Auth::user() -> id) -> first() -> value == 1
    )
        text-blueAlt
    @else
        text-fg 
    @endif
    cursor-pointer flex flex-row items-center justify-center pr-4 mx-1" id = "like_button_{{ $post -> id }}">
    <p class = "mt-2" id = "like_post_{{$post -> id}}">{{ $post -> like -> where('value', '1') -> count() }} </p>
    <i class = "p-1 fas fa-thumbs-up"></i>
</div>
<div onclick="post_like_handler({{$post -> id}}, -1, '{{ csrf_token() }}')" class = "
    @if (
        Auth::check() &&
        $post -> like -> where('user_id', Auth::user() -> id) -> first() != NULL &&
        $post -> like -> where('user_id', Auth::user() -> id) -> first() -> value == -1
    )
        text-blueAlt
    @else
        text-fg 
    @endif
    cursor-pointer flex flex-row items-center justify-center pr-4 mx-1" id = "dislike_button_{{ $post -> id }}">
    <p class = "mt-2" id = "dislike_post_{{$post -> id}}">{{ $post -> like -> where('value', '-1') -> count() }} </p>
    <i class = "p-1 mt-2 fas fa-thumbs-down"></i>
</div>
<a class = "text-fg flex flex-row items-center justify-center pr-4 mx-1 mt-2">
    {{ $post -> comment -> count() }}
    <i class = "p-1 fas fa-comment"></i>
</a>
@if (
    Auth::check() && 
    Auth::user() -> id == $post -> user -> id
)
    <div onclick="post_edit_mode({{ $post -> id }})" class = "text-fg cursor-pointer flex flex-row items-center justify-center pr-4 mx-1 mt-2" id = "edit_post_{{ $post -> id }}">
        <i class = "fas fa-pen"></i>
    </div>

    <form action="/post/delete" method = "post">
        @csrf
        <input type="hidden" name="post_id" value = {{ $post -> id }}>
        <button class = "text-fg cursor-pointer flex flex-row items-center justify-center pr-4 mx-1 mt-2">
            <i class = "fas fa-trash"></i>
        </button>
    </form>
    
@endif
<a class = "text-fg flex flex-row items-center justify-center pr-4 mx-1 mt-2">
    <i class = "p-1 fas fa-share"></i>
</a>
