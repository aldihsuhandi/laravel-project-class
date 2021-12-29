@foreach ($trending as $post)
<div class = "p-3 relative h-40 w-1/5 bg-bg rounded shadow-md relative">
    <div class = "p-1 flex flex-col">
        <div class = "text-fg font-bold font-xl">{{ $post -> title }}</div>
        <div class = "text-fg font-base font-base">{{ $post -> category -> name }}</div>
    </div>
    <div class = "absolute bottom-0 right-0 mr-3 mb-3 flex flex-row">
        <div class = "px-1 
        @if (
            Auth::check() &&
            $post -> like -> where('user_id', Auth::user() -> id) -> first() != NULL &&
            $post -> like -> where('user_id', Auth::user() -> id) -> first() -> value == 1
        )
            text-blue
        @else
            text-fg 
        @endif
        flex flex-row items-center justify-start"> 
            <p class = "mt-2">{{ $post -> like -> where('value', '1') -> count() }} </p>
            <i class = "p-1 fas fa-thumbs-up"></i>
        </div>
        <div class = "px-1 
        @if (
            Auth::check() &&
            $post -> like -> where('user_id', Auth::user() -> id) -> first() != NULL &&
            $post -> like -> where('user_id', Auth::user() -> id) -> first() -> value == -1
        )
            text-blue
        @else
            text-fg 
        @endif
        flex flex-row items-center justify-start"> 
            <p class = "mt-2">{{ $post -> like -> where('value', '-1') -> count() }} </p>
            <i class = "p-1 mt-2 fas fa-thumbs-down"></i>
        </div>
    </div>
</div>
@endforeach