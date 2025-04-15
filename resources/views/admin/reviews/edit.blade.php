@extends('layouts.admin')

@section('content')
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Reviews
                            <a href="{{ url('admin/reviews/edit') }}" class="btn btn-danger btn-sm float-end">Back</a></h4>
            </div>

<div class="card-body">
<form action="{{ url('admin/reviews/'.$reviews->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
    <div class=" col-md-6 mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $reviews->name }}" class="form-control">
        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
</div> 
   <div class="col-md-6 mb-3">
        <label>Title</label>
        <input type="text" name="title" value="{{ $reviews->title }}"  class="form-control">
        @error('title') <small class="text-danger">{{ $message }}</small>@enderror
    </div>  
     <div class="col-md-12 mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" row="3"> {{ $reviews->description }}  </textarea>
        @error('description') <small class="text-danger">{{ $message }}</small>@enderror
    </div>  


 <div class="col-md-6 mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        <img src="{{ asset($reviews->image) }}" width="60px" height="60px"/>
        @error('image') <small class="text-danger">{{ $message }}</small>@enderror
</div>   
<div class="col-md-6 mb-3">
        <label>Status</label><br/>
        <input type="checkbox" name="status">
</div>  

<div class="col-md-12 mb-3">
    <button type="submit" class="btn btn-primary float-end">Update</button>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
@endsection