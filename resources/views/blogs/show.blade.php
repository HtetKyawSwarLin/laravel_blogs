<x-layout>

    <x-slot name="title">
        <title>Blog Details</title>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-6 mx-auto text-center">
                <img src='{{asset("storage/$blog->thumbnail")}}'
                    class="card-img-top img-thumbnail" style="height: 400px;" alt="..." />
                <h3 class="my-3">{{ $blog->title }} </h3>
                <div>
                    <div><a class="text-black text-decoration-none" href="/users/{{ $blog->author->username }} ">Author -
                            {{ $blog->author->name }}</a> </div>
                    <div class='badge bg-primary'><a class=" text-decoration-none text-white"
                            href="/categories/{{ $blog->category->slug }}">{{ $blog->category->name }} </a></div>

                    <div>{{ $blog->created_at->format('F Y h:i:s A') }} </div>

                </div>
                <div>
                    <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                        @csrf
                        @auth
                            @if (auth()->user()->isSubscribed($blog))
                                <button class="btn btn-outline-danger my-2">UnSubscribe</button>
                            @else
                                 <button class="btn btn-outline-warning my-2">Subscribe</button>
                            @endif
                        @endauth
                    </form>
                </div>
                <p class="lh-md mt-3">
                    {!! $blog->body !!}
                </p>
            </div>
        </div>
    </div>
    <section class="container col-md-6 mx-auto">
        @auth
            <x-comment-form :blog='$blog' />
        @else
            <p class="text-center">Please<a href="/login">Login</a> to participate in discussion</p>
        @endauth
    </section>
    @if ($blog->comments->count())
        <x-comments :comments="$blog
            ->comments()
            ->latest()
            ->paginate(3)" />
    @endif

    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />

</x-layout>
