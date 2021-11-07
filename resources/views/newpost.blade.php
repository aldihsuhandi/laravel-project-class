@extends('template.master')

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section('title', 'New Post')

@section('content')
    {{-- TODO: refactor this code --}}
    <div class = "p-5 m-5 absolute flex flex-col items-start top-1/2 left-1/2 w-1/3 transform -translate-x-1/2 -translate-y-3/4">
        <p class = "text-fg text-lg font-bold">Create a post</p>
        <div class = "p-3 bg-bg shadow-md rounded-xl w-full flex flex-col justify-center items-center">
            <form action="" class = "flex flex-col m-0 justify-center items-center w-full">
                <input name = "title" type="text" placeholder = "Title" list = "categoryList" class = "m-1 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                <input name = "category" type="text" placeholder = "Category" list = "categoryList" class = "m-1 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                <datalist id = "categoryList">
                @foreach ($categories as $category)
                    <option value = "{{ $category -> name }}">
                @endforeach ($categories as $category)
                </datalist>
            </form>
        </div>
    </div>
@endsection