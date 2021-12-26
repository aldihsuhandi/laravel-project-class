@extends('template.master')
@section("title", "ReadIT | Register")

<style>
    body
    {
        overflow: hidden;
    }
</style>

@section("content")
    {{-- TODO: refactor this code --}}
    <div class="bg-bg rounded-xl shadow-md p-5 m-5 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-2/3 w-1/3">
        <p class = "text-fg text-xl text-center">Create an account</p>
        <form action="/registering" enctype="multipart/form-data" method = "POST" class="flex flex-col pt-5 mt-2">
            @csrf
            <label for="email" class="text-fg flex flex-col pt-2 mt-2">Email</label>
            <input type="text" class="bg-bgAlt py-2 px-3 block text-fgAlt appearance-none rounded w-11/12 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email">
            @error('email')
                <div class = "p-1 text-red text-sm">* {{ $message }}</div>
            @enderror
            <label for="username" class="text-fg flex flex-col pt-2 mt-2">Username</label>
            <input type="text" class="bg-bgAlt py-2 px-3 block text-fgAlt appearance-none rounded w-11/12 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username">
            @error('username')
                <div class = "p-1 text-red text-sm">* {{ $message }}</div>
            @enderror
            <label for="password" class="text-fg flex flex-col pt-2 mt-2">Password</label>
            <input type="password" class="bg-bgAlt py-2 px-3 block text-fgAlt appearance-none rounded w-11/12 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password">
            @error('password')
                <div class = "p-1 text-red text-sm">* {{ $message }}</div>
            @enderror
            <br>
            <br>
            <input type="submit" class="shadow rounded w-11/12 py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-fg text-fgBlack transition ease-in-out" value="Register">
            <p class = "py-1 text-fg text-xs">Already have an account? <a href="/login" class="text-blue">Login</a></p>
            <br>
            <p class = "py-1 text-fg text-xs">By registering, you agree to ReadIt's <a href="#" class="text-blue">Terms of Service</a> and <a href="#" class="text-blue">Privacy Policy</a></p>
        </form>
    </div>
@endsection