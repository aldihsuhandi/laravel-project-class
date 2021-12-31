<nav class = "flex flex-row sticky top-0 p-5 bg-bg justify-center items-center z-50">
    <a href = "/" class = "px-2 flex justify-center items-center">
        <img src="{{ asset('icon/logoReadIt.png') }}" alt="" class = "h-16">
    </a>
    <div class = "w-3/4">
        <form name = "search" action="/search" method="get" class = "m-0 w-full flex flex-col justify-start items-start">
            <div class = "w-2/3 bg-bgAlt mx-3 px-2 rounded-md flex flex-row justify-center items-center">
                <i class = "fas fa-search text-fg"></i>
                <input type="text" name = "search" class = "focus:outline-none w-11/12 p-2 bg-white rounded-md bg-bgAlt text-fg" placeholder="Search" @if (isset($search)) value = "{{ $search }}" @endif>
            </div>
            @if ( isset($action) && $action == "search")
                <div class="w-1/3 bg-bgAlt mx-3 px-2 rounded my-2 flex items-center">
                    <select name="category" id="category" class = "w-full bg-bgAlt p-2 rounded focus:outline-none rounded-md text-fg">
                        <option value = "-1" @if (isset($category_id) && $category_id == -1)
                            selected
                        @endif>All</option>
                        @foreach ($categories as $category)
                            <option value = {{ $category -> id }} @if (isset($category_id) && $category_id == $category -> id) selected @endif>{{ $category -> name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </form>
    </div>

    <div class = "flex flex-row justify-start items-center">
        @if (Auth::check())
            <a href="/user/{{ Auth::user() -> username }}" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Profile</a>
            <a href = "/logout" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Logout</a>
        @else
            <a href = "/login" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Login</a>
            <a href = "/register" class = "mx-3 p-2 rounded-md bg-bgAlt text-fg">Sign Up</a>
        @endif
    </div>
</nav>
