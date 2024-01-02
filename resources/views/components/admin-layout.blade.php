<x-layout>

    <x-slot name="title">
        <title>Blog Create</title>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-3">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><a href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blog/create">Blog Create</a></li>

                </ul>
            </div>
            <div class="col-md-8 offset-md-1">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
