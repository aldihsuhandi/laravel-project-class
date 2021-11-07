@extends('template.master')
@section("title", "ReadIT | Profile")

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section('content')
    <div class = "transform w-1/2 translate-y-1/3 translate-x-1/2 border-4 border-red border-opacity-100">
        <div class = "bg-bg shadow-md rounded-xl p-5 m-5 py-10 inline-block">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" width = "300" height = "300" class="">
            <input type="button" class = "shadow-md w-full py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-bgHover text-fgBlack transition ease-in-out" value = "Choose Photo">
        </div>
        <div class = "w-1/2 inline-block border-4 border-blue border-opacity-100">
            <p class = "text-fg text-xl"><b>Change Biodata</b></p>
            <form action="/profile" method="POST" class="m-5">
                <label for="name" class="text-fg text-xl">Name</label>
                <input type="text" id="name" name="name" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                
                <label for="email" class="text-fg text-xl">Email</label>
                <input type="text" id="email" name="email" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                
                <label for="password" class="text-fg text-xl">Password</label>
                <input type="text" id="password" name="password" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                
                <label for="description" class="text-fg text-xl">Description</label>
                <input type="text" id="description" name="description" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
            </form>
        </div>
        <div>
            <input type="submit" class = "shadow rounded w-full py-2 px-3 leading-tight bg-red cursor-pointer hover:bg-bgHover text-fg transition ease-in-out inline-block" value = "LOGOUT">
        </div>
    </div>
    
@endsection