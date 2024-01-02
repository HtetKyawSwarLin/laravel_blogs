<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">

            <a href="/register" class="nav-link">Register</a>
            <a href="/login" class="nav-link">Login</a>

            @can('admin')
                <a href="/admin/blogs" class="nav-link">DashBoard</a>
            @endcan
            <img src="{{ auth()->user()?->avatar }}" width="50" height="50" class="rounded-circle"
                alt="">
            <a href="" class="nav-link">Welcome {{ auth()->user()?->name }}</a>

            <form action="/logout" method="POST">
                @csrf
                <button class="nav-link btn btn-link" type="submit">Logout</button>
            </form>

            <a href="/#blogs" class="nav-link">Blogs</a>
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
