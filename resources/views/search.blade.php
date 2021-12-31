@extends('template.master')


@section('title', 'Search')

@section('content')
    <div class = "flex flex-col py-5 mx-5 w-3/5 items-center justify-center" id = "search_post">
        @include('post.template')
    </div>
@endsection

@section('script')
    <script src = {{ asset('js/post.js' )}}></script>
    <script src = {{ asset('js/infinite_scroll.js' )}}></script>
    <script src = {{ asset('js/search.js' )}}></script>
@endsection
