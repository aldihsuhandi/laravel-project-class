<nav class = "flex flex-row sticky top-0 p-5 bg-bg justify-center items-center z-50">
    <a href = "/" class = "px-2 flex justify-center items-center">
        <img src="{{ asset('icon/logoReadIt.png') }}" alt="" class = "h-16">
    </a>
    <div class = "w-3/4">
        <form action="" method="post" class = "m-0 w-full flex flex-row justify-center items-center">
            <div class = "w-2/3 bg-bgAlt mx-3 px-2 rounded-md flex flex-row justify-center items-center">
                <i class = "fas fa-search text-fg"></i>
                <input type="text" name = "search" class = "focus:outline-none w-11/12 p-2 bg-white rounded-md bg-bgAlt text-fg" placeholder="Search">
            </div>
        </form>
    </div>

    <div class = "flex flex-row justify-start items-center">
        @if (Auth::check())
            <a href = "/logout" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Logout</a>
        @else
            <a href = "/login" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Login</a>
            <a href = "/register" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Sign Up</a>
        @endif
    </div>
</nav>