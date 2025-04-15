<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewsModel;
class ReviewsController extends Controller
{
    public function index()
    {
    $reviews= ReviewsModel::where('status','0')->get();
    return view('admin.reviews.index',compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create'); 
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255|alpha|',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|max:2048',
            'status' => 'nullable',
        ]);
        $reviews = new ReviewsModel();
        $reviews->name = $request->input('name');
        $reviews->title = $request->input('title');
        $reviews->description = $request->input('description');
        $reviews->status = $request->has('status') ? '1' : '0';
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . rand(1000,50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/reviews',$fileName);
            $imagePath = 'upload/reviews/' . $fileName;
            $reviews->image = $imagePath;
        }
        $reviews->save();
        return redirect()->route('admin.reviews.index')->with('success','Reviews has been created successfully');
    }


    public function edit($id)
    {
        $reviews = ReviewsModel::find($id);
        return view('admin.reviews.edit',compact('reviews')); 
    }

    public function update(Request $request , $id)
    {
        $reviews = ReviewsModel::find($id);
        $request->validate([
            'name' => 'required|string|max:255|alpha|',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|max:2048',
            'status' => 'nullable',
        ]);
        $reviews->name = $request->input('name');
        $reviews->title = $request->input('title');
        $reviews->description = $request->input('description');
        $reviews->status = $request->has('status') ? '1' : '0';
        if($request->hasFile('image')) {
            if($reviews->image != null) unlink($reviews->image);
            $image = $request->file('image');
            $fileName = time() . rand(1000,50000) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/reviews',$fileName);
            $imagePath = 'upload/reviews/' . $fileName;
            $reviews->image = $imagePath;
        }
        $reviews->update();
        return redirect()->route('admin.reviews.index')->with('success','Reviews has been updated successfully');

    }

public function delete($id)
{
    $reviews = ReviewsModel::find($id);
    if(!$reviews)
    {
        return redirect()->route('admin.reviews.index')->with('error','Reviews not found');
    }
    $reviews->delete();
    return redirect()->route('admin.reviews.index')->with('success','Reviews has been deleted successfully');
}

}
