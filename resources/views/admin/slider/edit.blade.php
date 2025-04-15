@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Slider
                            <a href="{{ url('admin/sliders/') }}" class="btn btn-danger text-white btn-sm float-end">
                                Back</a></h4>
</div>

<div class="card-body">
<form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
</div>

<div class="mb-3">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if($slider->image)
        <img src="{{ asset($slider->image) }}" alt="Slider Image" width="100" height="100" class="mt-2">
    @endif
</div>


<div class="mb-3">
        <label>Status</label>
        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'cheched' : '' }}  class="form-control" style="width:30px;height:50px" />
        checked=Hidden , Unchecked=Visible
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
