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
    <div class = "rounded-xl p-5 m-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-3/4 w-1/3">
        <p class = "text-fg text-lg font-bold">Create a post</p>
        <div class = "p-3 bg-bg shadow-md rounded-xl w-full flex flex-col justify-center items-center">
            <form action="" method = "post" class = "px-3 flex flex-col m-0 justify-center items-center w-full">
                <input name = "title" type="text" placeholder = "Title" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                <input name = "category" type="text" placeholder = "Category" list = "categoryList" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                <datalist id = "categoryList">
                @foreach ($categories as $category)
                    <option value = "{{ $category -> name }}">
                @endforeach ($categories as $category)
                </datalist>
                <textarea name="description" id="" cols="30" rows="10" placeholder = "Description" class = "resize-none my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline"></textarea>

                <div class = "w-full flex justify-end items-center">
                    <input type="submit" class = "bg-green w-2/5 rounded text-white px-5 py-1 my-2" value = "Post">
                </div>
            </form>
        </div>
    </div>
@endsection