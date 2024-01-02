@props(['blog'])
<div class="card">
    <img src='{{ asset("storage/$blog->thumbnail") }}' class="card-img-top img-fluid img-thumbnail" style="height: 250px"
        alt="..." />
    <div class="card-body">
        <h3 class="card-title">{{ $blog->title }} </h3>
        <p class="fs-6 text-secondary">
            <a class="text-decoration-none text-black" href="/?username={{ $blog->author->username }} ">
                {{ $blog->author->name }}</a>
            <span>{{ $blog->created_at->format('F Y h:i:s A') }} </span>
        </p>
        <div class="tags my-3">
            <a href="/?category={{ $blog->category->slug }}"><span class="badge bg-primary">{{ $blog->category->name }}
                </span></a>
        </div>
        <p class="card-text">
            {{ $blog->intro }}
        </p>
        <a href="/blogs/{{ $blog->slug }} " class="btn btn-primary">Read More</a>
    </div>
</div>
