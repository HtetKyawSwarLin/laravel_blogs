<x-admin-layout>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center">Blogs</h3>

    <x-card-wrapper>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Intro</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    @if ($blog->author->id === Auth::user()->id)
                        <tr>
                            <td> <a href="/blogs/{{ $blog->slug }}" target="_blank">{{ $blog->title }}</a> </td>
                            <td>{{ $blog->intro }} </td>
                            <td><a href="/admin/blogs/{{ $blog->slug }}/edit" class="btn btn-success">Edit</a></td>
                            <td>
                                <form action="/admin/blogs/{{ $blog->slug }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="4">
                                <h3 class=" text-danger text-center">No Blogs Created</h3>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        {{ $blogs->links() }}
    </x-card-wrapper>
</x-admin-layout>
