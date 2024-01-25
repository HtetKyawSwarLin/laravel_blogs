<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Blogify</a>
        <div class="d-flex">

            @if (!auth()->user())
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @else
                <form action="/logout" method="POST">
                    @csrf
                    <button class="nav-link btn btn-link" type="submit">Logout</button>
                </form>
            @endif



            @can('admin')
                <a href="/admin/blogs" class="nav-link">DashBoard</a>
            @endcan
            @if (auth()->user())
                <img src="{{ auth()->user()->avatar }}" width="50" height="50" class="rounded-circle"
                    alt="">
                <a href="" class="nav-link">Welcome {{ auth()->user()?->name }}</a>
            @endif


            <a href="/#blogs" class="nav-link">Blogs</a>

        </div>
    </div>
</nav>
