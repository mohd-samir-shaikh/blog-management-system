<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $blogs = Blog::when($search, function ($query, $search) {

                return $query->where('title', 'LIKE', "%{$search}%");

            })

            ->when($category, function ($query, $category) {

                return $query->where('category', $category);

            })

            ->latest()
            ->paginate(3);

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'required|image',

        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $imagePath = 'uploads/'.$imageName;
        }

        Blog::create([

            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'image' => $imagePath,

        ]);

        return redirect('/blogs')
                ->with('success', 'Blog added successfully');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([

            'title' => 'required',
            'category' => 'required',
            'content' => 'required',

        ]);

        $imagePath = $blog->image;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                                ->store('blogs', 'public');
        }

        $blog->update([

            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'image' => $imagePath,

        ]);

        return redirect('/blogs')
                ->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect('/blogs')
                ->with('success', 'Blog deleted successfully');
    }
}
