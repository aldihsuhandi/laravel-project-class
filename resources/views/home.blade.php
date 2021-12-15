@extends('template.master')

@section('title', 'Homepage')

@section('content')
<div class = "flex flex-col py-5 mx-5 w-3/5 items-center justify-center">
    <div class = "w-full flex justify-between items-end">
        <p class = "text-fg text-xl font-bold">Trending</p>
        <p class = "text-fg">Show all Trending</p>
    </div>
    <div class = "w-full flex flex-row justify-evenly items-center py-2 my-2">
        @foreach ($trending as $post)
            <div class = "p-3 relative h-auto w-1/4 bg-bg rounded shadow-md">
                <div class = "p-1 flex flex-col">
                    <div class = "text-fg font-bold font-xl">{{ $post -> title }}</div>
                    <div class = "text-fg font-base font-base">{{ $post -> category -> name }}</div>
                </div>
                <div class = "w-full flex flex-row justify-end">
                    <div class = "px-1 text-fg"> <i class = "fas fa-thumbs-up"></i></div>
                    <div class = "px-1 text-fg"> <i class = "fas fa-thumbs-down"></i></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class = "flex flex-row justify-between items-center">
        {{-- post  --}}
        <div class = "w-4/5">

        </div>
        {{-- category --}}
        <div class = "w-1/5 bg-bg rounded shadow-md">
            <div class = "flex flex-col justify-center items-center px-2">
                @foreach ($categories as $category)
                    <div class = "bg-bgAlt p-2 rounded">{{ $category -> name }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection