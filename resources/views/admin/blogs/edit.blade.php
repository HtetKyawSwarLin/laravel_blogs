<x-admin-layout>

    <x-slot name="title">
        <title>Blog Edit</title>
    </x-slot>
    <h3 class="my-3 text-center">Blog Edit</h3>

    <x-card-wrapper>

        <form action="/admin/blogs/{{ $blog->slug }}/update" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <x-form.input name='title' value="{{ $blog->title }} " />
            <x-form.input name='slug' value="{{ $blog->slug }}" />
            <x-form.input name='intro' value="{{ $blog->intro }}" />
            <x-form.input name='thumbnail' type='file' />
            <img src="/storage/thumbnails/{{ $blog->thumbnail }}" width="200px" height="150px" alt="">
            <x-form.textarea name='body' value="{{ $blog->body }}" />

            <x-form.input-form-wrapper>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id', $blog->category->id) ? 'selected' : '' }}
                            value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error name="category_id" />
            </x-form.input-form-wrapper>

            <x-form.input-form-wrapper>
                <button class="btn btn-primary" type="submit">Submit</button>
            </x-form.input-form-wrapper>

        </form>
    </x-card-wrapper>

</x-admin-layout>
