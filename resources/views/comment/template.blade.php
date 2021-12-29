@if (isset($action) && $action == "user-profile")
    @forelse ($comments as $comment)
        @include('comment.comment')
    @empty
        <div class = "w-full text-fg font-bold text-3xl text-center py-5">
            <p>There is no comment</p>
        </div>
    @endforelse
@else
    @forelse ($post -> comment as $comment)
        @include('comment.comment')
    @empty
        <div class = "w-full text-fg font-bold text-3xl text-center pb-5">
            <p>There is no comment</p>
        </div>
    @endforelse
@endif