@extends('template.master')
@section('title', "Profile | ".$user -> username)

@section('content')
    <div class = "w-full flex flex-row justify-between items-start p-3 m-5">
        {{-- profile info --}}
        <div class = "w-1/5 p-2 mx-3 rounded bg-bg flex flex-col items-center justify-center">
            <div class = "h-48 w-48 bg-fg rounded-full m-3 bg-cover bg-no-repeat bg-center" style = "background-image: url('{{ asset($user -> profile_img) }}');">
                {{-- <img src="{{ asset($user -> profile_img) }}" alt="" class = "object-cover rounded-full"> --}}
            </div>
            <div class = "text-fg font-bold text-3xl">{{ $user -> username }}</div>
            <div class = "text-fg text-base">{{ $user -> email }}</div>
            <div class = "text-fg text-base pt-3">
                {{ $user -> description}}
            </div>
            @if (Auth::check() && Auth::user() -> id == $user -> id)
                <div class = "w-4/5 border-b-2 border-fg mx-5 my-3"></div>
                <a href="/user/update" class = "w-3/5 flex justify-center items-center bg-blueAlt rounded m-3 p-2">Edit Profile</a>
            @endif
        </div>
        {{-- comment & post history --}}
        <div class = "w-4/5 p-2 mx-3 rounded bg-bg flex flex-col items-center justify-center">
            {{-- header --}}
            <div class = "border-bgAlt border-b-2 w-full text-fg flex flex-row">
                <div onclick = "post()" class = "p-2 px-3 my-2 text-xl font-bold cursor-pointer border-b border-bgButton" id = "post-slide">Post</div>
                <div onclick = "comment()" class = "p-2 px-3 my-2 text-xl font-bold cursor-pointer border-bgButton" id = "comment-slide">Comment</div>
            </div>
            <div class = "flex flex-col justify-center items-center w-full" id = "post">
                @include('post.template')
            </div>
            <div class = "flex flex-col justify-center items-center w-full hidden" id = "comment">
                @include('comment.template')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src = {{ asset('js/post.js' )}}></script>
    <script src = {{ asset('js/comment.js' )}}></script>
    <script src = {{ asset('js/profile.js' )}}></script>
@endsection
