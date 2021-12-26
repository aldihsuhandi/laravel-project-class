@foreach ($posts as $post)
    <div class = "relative p-3 rounded shadow-md bg-bg w-full my-2">
        <div id = "post_view_{{ $post -> id }}">
            <a class = "w-full flex flex-row justify-between items-end" href = "/post/view/{{ $post -> id }}">
                <div class = "font-semibold text-xl text-fg" id = "post_title_{{ $post -> id }}">{{ $post -> title }}</div>
                <div class = "font-base text-md text-fg" id = "post_category_{{ $post -> id }}">{{ $post -> category -> name }}</div>
            </a>
            <div class = "flex flex-row justify-start items-center w-full">
                <img src="{{ asset($post -> user -> profile_img) }}" alt="" height = 25px width = 25px class = "rounded-full">
                <div class = "
                @if(
                    Auth::check() &&
                    $post -> user -> id == Auth::user() -> id
                )
                text-blue
                @else
                text-fg 
                @endif
                text-md pl-1">{{ $post -> user -> username }}</div>
            </div>
            <div class = "flex flex-row text-justify items-center w-full py-2 text-fg" id = "post_description_{{ $post -> id }}">
                {{ $post -> description }}
            </div>
            <div class = "w-full flex flex-row justify-start items-center pt-3">
                @include('post.button')
            </div>
        </div>
        @if (
            Auth::check() &&
            Auth::user() -> id == $post -> user -> id
        )
            @include('post.editform')
        @endif
    </div>
@endforeach