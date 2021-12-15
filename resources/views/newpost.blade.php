@extends('template.master')

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section('title', 'ReadIt | New Post')

@section('content')
    {{-- TODO: refactor this code --}}
    <div class = "rounded-xl p-5 m-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2/5">
        <p class = "text-fg text-lg font-bold">Create a post</p>
        <div class = "p-3 bg-bg shadow-md rounded-xl w-full flex flex-col justify-center items-center">
            <form action="/post/new" method = "post" class = "px-3 flex flex-col m-0 justify-center items-center w-full">
                <input name = "title" type="text" placeholder = "Title" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                {{-- <input name = "category" type="text" placeholder = "Category" list = "categoryList" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline"> --}}
                <select name="category" id="category" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline" placeholder = "category">
                    @foreach ($categories as $category)
                        <option value = "{{ $category -> id }}"> {{ $category -> name }} </option>
                    @endforeach
                </select>
                <textarea name="description" id="" cols="30" rows="10" placeholder = "Description" class = "resize-none my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline"></textarea>

                <div class = "w-full flex justify-end items-center">
                    <input type="submit" class = "bg-green w-2/5 rounded text-white px-5 py-1 my-2 text-fg" value = "Post">
                </div>
            </form>
        </div>
    </div>
@endsection