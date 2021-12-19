@forelse ($post -> comment as $comment)

@empty
    <div class = "w-full text-fg font-bold text-3xl text-center pb-5">
        <p>There is no comment</p>
    </div>
@endforelse