<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{

    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(6)
        ]);
    }

    public function create()
    {

        return view('admin.blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {


        $formData = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'intro' => ['required'],
            'body' => ['required'],
            'thumbnail' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]

        ]);

        $formData['user_id'] = auth()->user()->id;
        $formData['thumbnail'] = Storage::putFile('thumbnails', request()->file('thumbnail'));
        Blog::create($formData);

        return redirect('/')->with('success', 'Blog Created');
    }



    public function destory(Blog $blog)
    {
        $blog->delete();

        return back()->with('success', 'Deleted Successfully');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            "blog" => $blog,
            "categories" => Category::all()
        ]);
    }

    public function update(Blog $blog)
    {

        $formData = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'intro' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $formData['user_id'] = auth()->user()->id;
        $formData['thumbnail'] = request()->file('thumbnail') ?
            Storage::putFile('thumbnails', request()->file('thumbnail')) : $blog->thumbnail;
        $blog->update($formData);

        return redirect('/')->with('success', 'Blog Created');
    }
}
