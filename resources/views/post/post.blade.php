@extends('template.master')
@section('title', "title")
@section('content')
    <div class = "rounded flex flex-col w-3/5 bg-bg p-3 m-3 relative shadow-md">
        {{-- post design --}}
        <div class = "flex flex-col justify-center items-start p-1 m-2" id = "post_view_{{ $post -> id }}">
            <div class = "text-fg font-bold text-2xl" id = "post_title_{{ $post -> id }}">{{ $post -> title }}</div>
            <a href = "/search?category={{ $post -> category -> id }}" class = "text-fg text-sm text-grey" id = "post_category_{{ $post -> id }}">{{ $post -> category -> name }}</a>
            <div class = "text-fg font-base text-base py-2" id = "post_description_{{ $post -> id }}">
                {{ $post -> description }}
            </div>
            <div class = "flex flex-row items-center">
                @include('post.button')
            </div>
        </div>
        @if (
                Auth::check() &&
                Auth::user() -> id == $post -> user -> id
            )
            @include('post.editform')
        @endif
        {{-- add comment --}}
        <div class = "px-1 mx-2 text-sm text-fg">
            @if (Auth::check() == false)
                <a href="/login" class="decoration-none text-blue">Login!</a> to comment
            @else
                comment as <a href="" class = "decoration-none text-blue">{{ Auth::user() -> username }}</a>
            @endif
        </div>
        <div class = "flex flex-col justify-center items-start p-1 m-2">
            <form action="/post/{{ $post -> id }}/comment/new" method = "post" class = "w-full flex flex-col justify-center items-center">
                @csrf
                <textarea name="comment" id="comment" cols="30" rows="5" class = "w-full bg-bg border border-inputBg resize-none text-fgAlt p-2 appearance-none rounded leading-tight focus:outline-none focus:shadow-outline" placeholder="Comment"></textarea>
                <div class = "w-full flex justify-end items-center pt-2 mt-2">
                    <input type="submit" value = "Comment!" class = "shadow rounded py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-fg text-fgBlack transition ease-in-out">
                </div>
            </form>
        </div>
        {{-- Comment Section --}}
        <div class = "w-full flex flex-col">
            @include('comment.template')
        </div>
    </div>
@endsection

@section('script')
    <script src = "{{ asset('js/post.js') }}"></script>
    <script src = "{{ asset('js/comment.js') }}"></script>
    <script src = "{{ asset('js/post.js') }}"></script>
@endsection
