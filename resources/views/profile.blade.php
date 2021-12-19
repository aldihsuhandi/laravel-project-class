@extends('template.master')
@section("title", "ReadIT | Profile")

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section('content')
    <div class="w-full">
        <div class = "grid grid-cols-5 gap-14 w-2/5 transform translate-x-3/4">
            <div class = "bg-bg shadow-md rounded-xl p-5 py-10 col-span-2">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" width = "300" height = "300" class="">
                <form action="/profile_update" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="file" id="image" name="image" class="shadow-md w-full py-2 px-3 mt-10 leading-tight bg-bgButton cursor-pointer hover:bg-bgHover text-fgBlack transition ease-in-out">
            </div>
            <div class = "w-full col-span-3">
                <p class = "text-fg text-xl"><b>Change Biodata</b></p>
                    <label for="name" class="text-fg text-xl">Name</label>
                    <input type="text" id="name" name="name" value="{{Auth::user()->username}}" class="bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                    
                    <label for="email" class="text-fg text-xl">Email</label>
                    <input type="text" id="email" name="email" value="{{Auth::user()->email}}" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                    
                    <label for="password" class="text-fg text-xl">Password</label>
                    <input type="password" id="password" name="password" placeholder="New Password" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                    
                    <label for="description" class="text-fg text-xl">Description</label>
                    <input type="text" id="description" name="description" value="{{Auth::user()->description}}" class = "bg-inputBg py-2 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">
                
                    <input type="submit" value="UPDATE PROFILE" class="shadow rounded w-full py-2 px-3 mt-28 leading-tight bg-green cursor-pointer hover:bg-bgHover text-fg transition ease-in-out inline-block">
                </form>
            </div>
            <div class="py-1/2 col-span-5">
                <a href="/logout" class="shadow rounded w-full py-2 px-3 mt-28 leading-tight bg-red cursor-pointer hover:bg-bgHover text-fg transition ease-in-out inline-block">LOGOUT</a>
            </div>
        </div>
    </div>
@endsection