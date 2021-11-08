@extends('template.master')
@section("title", "ReadIT | Profile")

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section('content')
    <div class = "grid grid-cols-5 gap-4 w-2/5 transform translate-x-3/4 translate-y-36">
        <div class = "bg-bg shadow-md rounded-xl p-5 py-10 col-span-2">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" width = "300" height = "300" class="">
            <input type="button" class = "shadow-md w-full py-2 px-3 mt-10 leading-tight bg-bgButton cursor-pointer hover:bg-bgHover text-fgBlack transition ease-in-out" value = "Choose Photo">
        </div>
        <div class = "w-full col-span-3">
            <p class = "text-fg text-xl"><b>Change Biodata</b></p>
            <form action="/profile" method="POST" class="">
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
        <div class="py-1/2 col-span-5">
            <input type="submit" class = "shadow rounded w-full py-2 px-3 mt-28 leading-tight bg-red cursor-pointer hover:bg-bgHover text-fg transition ease-in-out inline-block" value = "LOGOUT">
        </div>
    </div>
    
@endsection