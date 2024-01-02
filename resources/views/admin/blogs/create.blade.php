<x-admin-layout>

    <x-slot name="title">
        <title>Blog Create</title>
    </x-slot>
    <h3 class="my-3 text-center">Blog Create</h3>

    <x-card-wrapper>

        <form action="/admin/blog/store" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name='title' />
            <x-form.input name='slug' />
            <x-form.input name='intro' />
            <x-form.input name='thumbnail' type='file' />
            <x-form.textarea name='body' />

            <x-form.input-form-wrapper>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">
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
