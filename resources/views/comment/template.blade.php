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
            <a class = "px-1 
            @if (
                Auth::check() && 
                Auth::user() -> id == $comment -> user_id
            )
                text-blueAlt 
            @else
                text-fg
            @endif
            decoration-none"> {{ $comment -> user -> username }} </a>
        </div>
        <div class = "px-4 mx-5 py-2 text-fg" id = "comment_description_{{ $comment -> id }}">
            {{ $comment -> description }}
        </div>
        <div class = "px-4 mx-5 py-2 text-fg hidden" id = "comment_edit_{{ $comment -> id }}">
            <form name = "form_edit_{{ $comment -> id }}" class = "w-full">
                @csrf
                <input type="hidden" name = "comment_id" value = {{ $comment -> id}}>
                <input type="hidden" name = "post_id" value = {{ $post -> id}}>
                <textarea name="comment" id="comment" class = "w-full bg-inputBg border-2 border-inputBg resize-none text-fgAlt p-2 appearance-none rounded leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="5">{{ $comment -> description }}</textarea>
                <div class = "text-red text-sm p-1 hidden" id = "comment_error_{{ $comment -> id }}"></div>
                <div class = "w-full flex flex-row justify-end items-center">
                    <a onclick="cancel_update('form_edit_{{ $comment -> id }}')" class = "shadow rounded py-2 px-3 leading-tight bg-red cursor-pointer text-fg transition ease-in-out m-1">Cancel</a>
                    <a onclick="update_comment('form_edit_{{ $comment -> id }}')" class = "shadow rounded py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-fg text-fgBlack transition ease-in-out m-1">Save</a>
                </div>
            </form>
        </div>
        <div class = "flex flex-row justify-start items-center">
            @include('comment.templatebutton')
        </div>
    </div>
@empty
    <div class = "w-full text-fg font-bold text-3xl text-center pb-5">
        <p>There is no comment</p>
    </div>
@endforelse