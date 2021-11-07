@extends('template.master')
@section("title", "ReadIT | Profile")

@section('content')
    <div class = "bg-bg shadow-md rounded-xl p-5 m-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-3/4 w-1/3">
        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
        <input type="submit" class = "shadow rounded w-auto py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-bgHover text-fgBlack transition ease-in-out" value = "Choose Photo">
    </div>
    <div>
        <p class = "text-fg text-xl"><b>Change Biodata</b></p>
        <form action="">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class = "bg-bgAlt py-2 px-3 block text-fgAlt shadow appearance-none rounded w-3/4 leading-tight focus:outline-none focus:shadow-outline">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class = "bg-bgAlt py-2 px-3 block text-fgAlt shadow appearance-none rounded w-3/4 leading-tight focus:outline-none focus:shadow-outline">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" class = "bg-bgAlt py-2 px-3 block text-fgAlt shadow appearance-none rounded w-3/4 leading-tight focus:outline-none focus:shadow-outline">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class = "bg-bgAlt py-2 px-3 block text-fgAlt shadow appearance-none rounded w-3/4 leading-tight focus:outline-none focus:shadow-outline">
        </form>
    </div>
@endsection