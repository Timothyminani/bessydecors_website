<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    public function index()
    {

         $posts = Blog::orderBy('id', 'desc')->get();

        return Inertia::render('Admin/Blog', [

            'posts' => $posts

        ]);
    }





public function publicIndex(Request $request)
{
    $category = $request->query('category');

    $query = Blog::orderBy('created_at', 'desc');

    if ($category && $category !== 'All') {
        $query->where('category', $category);
    }

    $posts = $query->paginate(6)->withQueryString();

    return Inertia::render('Blog', [
        'posts' => $posts,
        'selectedCategory' => $category ?? 'All',
        'categories' => [
            'Furniture',
            'Interior Design',
            'Home Decor',
            'Inspiration',
            'Life Style'
        ],
    ]);
}







    public function show($slug)
    {
        $post = Blog::where('slug', $slug)->firstOrFail();

        return Inertia::render('SingleBlog', [
            'post' => $post
        ]);
    }



public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240', // limit size to 2MB
        'category' => 'nullable|string'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        // store image in 'storage/app/public/blogs' folder
        $imagePath = $request->file('image')->store('blogs', 'public');
    }

    Blog::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'content' => $request->content,
        'category' => $request->category,
        'image' => $imagePath, // store path in DB
    ]);

    return redirect()->back()->with('success', 'Post created');
}







public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240', // limit size to 10MB
    ]);

    $imagePath = $blog->image; // default old image

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public');
    }

    $blog->update([
        'title' => $request->title,
        'slug'  => Str::slug($request->title),
        'content' => $request->content,
        'category' => $request->category,
        'image' => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Post updated successfully');
}





public function destroy($id)
{
    $blog = Blog::findOrFail($id);

    // Delete image if exists
    if ($blog->image && Storage::disk('public')->exists($blog->image)) {
        Storage::disk('public')->delete($blog->image);
    }

    $blog->delete();

    return back()->with('success', 'Blog deleted successfully');
}








}
