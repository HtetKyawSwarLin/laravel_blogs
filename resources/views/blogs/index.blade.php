<x-layout>

    <x-slot name="title">
        <title>Blogify</title>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <x-hero />

    <x-blog-section :blogs="$blogs" />

</x-layout>
