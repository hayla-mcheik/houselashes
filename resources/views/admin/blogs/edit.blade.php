@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Blog
                            <a href="{{ url('admin/blogs/') }}" class="btn btn-danger text-white btn-sm float-end">
                                Back</a></h4>
</div>

<div class="card-body">
<form action="{{ url('admin/blogs/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" value="{{ $blog->title }}" class="form-control">
</div>

<div class="mb-3">
    <label>By</label>
    <input type="text" name="by" value="{{ $blog->by }}" class="form-control">
</div>
<div class="mb-3">
    <label>Date</label>
    <input type="date" name="date" value="{{ $blog->date }}" class="form-control">
</div>

<div class="mb-3">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" rows="3">{{ $blog->description }}</textarea>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if($blog->image)
        <img src="{{ asset($blog->image) }}" alt="Slider Image" width="100" height="100" class="mt-2">
    @endif
</div>


<div class="mb-3">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
</div>
</div>
</div>
</div>


@endsection
