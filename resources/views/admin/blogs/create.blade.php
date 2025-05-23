@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Blog
                            <a href="{{ url('admin/blogs') }}" class="btn btn-danger text-white btn-sm float-end">
                                Back</a></h4>
</div>

<div class="card-body">
<form action="{{ url('admin/blogs/create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
</div>
<div class="mb-3">
    <label>By</label>
    <input type="text" name="by" class="form-control">
</div>

<div class="mb-3">
    <label>Date</label>
    <input type="date" name="date" class="form-control">
</div>


<div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" class="form-control" rows="3">
</div>
<div class="form-group mb-3">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>


@endsection
