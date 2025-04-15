@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
                        <h4>Blogs List
                            <a href="{{ url('admin/blogs/create') }}" class="btn btn-primary btn-sm float-end">
                                Add Blog</a></h4>
</div>

<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>by</th>
            <th>date</th>
            <th>description</th>
            <th>image</th>
            <th>Action</th>
</tr>
</thead>
<tbody>

@forelse($blogs as $blog)
<tr>
    <td>{{ $blog->id }}</td>
    <td>{{ $blog->title }}</td>
    <td>{{ $blog->by }}</td>
    <td>{{ $blog->date }}</td>
    <td>{{ \Illuminate\Support\Str::limit($blog->description,100) }}</td>
    @if($blog->image)
    <td><img src="{{ asset($blog->image) }}" width="100px" /></td>
    @endif
    <td>
        <a href="{{ url('admin/blogs/'.$blog->id.'/edit') }}" class="btn btn-success" >Edit</a>
        <a href="{{ url('admin/blogs/'.$blog->id.'/delete') }}"  
        onclick="return confirm('Are you sure you want to delete this blog?');"
        class="btn btn-danger" 
        >Delete</a>
    </td>
</tr>
@empty
<tr><td colspan="7" class="text-center">No Blogs Available</td></tr>
@endforelse

</tbody>
</table>
</div>
</div>
</div>
</div>


@endsection
