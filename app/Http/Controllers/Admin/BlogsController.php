<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all();
        return view('admin.blogs.index',compact('blogs'));
    }
    public function create()
    {
    
        return view('admin.blogs.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'by' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string|max:3000',
            'image' => 'required|mimes:jpeg,jpg,png,webp|max:2048',
        ]);
    
        $blogs = new Blogs();
        $blogs->title = $request->input('title');
        $blogs->by = $request->input('by');
        $blogs->date = $request->input('date');
        $blogs->description = strip_tags($request->input('description'));
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/sliders'), $filename);
            $blogs->image = 'uploads/sliders/' . $filename;
        }
    
        $blogs->save();
    
        return redirect('admin/blogs')->with('message', 'Blog Added Successfully');
    }
    
    public function edit($id)
{
    $blog = Blogs::findOrFail($id);
    return view('admin.blogs.edit', compact('blog'));
}

public function update(Request $request, $id)
{
    $this->validate($request, [
        'title' => 'required|string|max:255',
        'by' => 'required|string|max:255',
        'date' => 'required|date',
        'description' => 'required|string|max:3000',
        'image' => 'nullable|mimes:jpeg,jpg,png,webp|max:2048',
    ]);

    $blog = Blogs::findOrFail($id);
    $blog->title = $request->input('title');
    $blog->by = $request->input('by');
    $blog->date = $request->input('date');
    $blog->description = strip_tags($request->input('description'));

    if ($request->hasFile('image')) {
        // Delete the old image
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/sliders'), $filename);
        $blog->image = 'uploads/sliders/' . $filename;
    }

    $blog->save();

    return redirect('admin/blogs')->with('message', 'Blog Updated Successfully');
}

public function destroy($id)
{
    $blog = Blogs::findOrFail($id);
    
    // Delete the image if it exists
    if ($blog->image && file_exists(public_path($blog->image))) {
        unlink(public_path($blog->image));
    }
    
    $blog->delete();

    return redirect('admin/blogs')->with('message', 'Blog Deleted Successfully');
}

}
