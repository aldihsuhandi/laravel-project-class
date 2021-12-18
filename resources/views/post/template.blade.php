@foreach ($posts as $post)
    <div class = "relative p-3 rounded shadow-md bg-bg w-full my-2">
        <a class = "w-full flex flex-row justify-between items-end" href = "/post/view/{{ $post -> id }}">
            <div class = "font-semibold text-xl text-fg">{{ $post -> title }}</div>
            <div class = "font-base text-md text-fg">{{ $post -> category -> name }}</div>
        </a>
        <div class = "flex flex-row justify-start items-center w-full">
            <i class = "fas fa-user text-fg pr-1"></i>
            <div class = "text-fg text-md pl-1">{{ $post -> user -> username }}</div>
        </div>
        <div class = "flex flex-row text-justify items-center w-full py-2 text-fg">
            {{ $post -> description }}
        </div>
        <div class = "w-full flex flex-row justify-start items-center pt-3">
            @include('post.button')
        </div>
    </div>
@endforeach