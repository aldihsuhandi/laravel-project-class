@extends('template.master')
@section("title", "ReadIT | Login")

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section("content")
    <div class = "flex flex-col justify-center items-center bg-bg shadow-md rounded-xl p-5 m-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-3/4 w-1/3">
        <p class = "text-fg text-xl"><b>Welcome back!</b></p>
        <p class = "text-fg text-xl">We're excited to see you again!</p>
        <div class = "flex flex-row justify-between items-center w-full">
            <form action="/login" enctype="multipart/form-data" method = "POST" class = "flex flex-col pt-5 mt-2 w-2/3 px-2">
                @csrf
                <label for="email" class = "text-fg block mb-2 text-md">Email</label>
                <input type="text" class = "bg-bgAlt py-2 px-3 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline" id = "email" name = "email">
                <label for="email" class = "pt-3 text-fg block mb-2 text-md">Password</label>
                <input type="password" class = "bg-bgAlt py-2 px-3 block text-fgAlt shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline" id = "password" name = "password">
                <a href="#" class = "py-1 text-blue text-xs">Forgot your password?</a>
                <br>
                <input type="submit" class = "shadow rounded w-full py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-bgHover text-fgBlack transition ease-in-out" value = "Login">
                <p class = "py-1 text-fg text-xs">Need an account? <a href="/register" class = "text-blue">Register</a></p>
            </form>

            <img src="{{ asset('icon/logoReadIt.png') }}" alt="" class = "w-1/3 h-auto px-2">
        </div>
    </div>
@endsection
