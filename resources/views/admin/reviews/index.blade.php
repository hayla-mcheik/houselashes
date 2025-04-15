@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
                        <h4>Reviews List
                            <a href="{{ url('admin/reviews/create') }}" class="btn btn-primary btn-sm float-end">
                                Add Reviews</a></h4>
</div>

<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
</tr>
</thead>
<tbody>
@if($reviews)
@foreach($reviews as $item)

    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->title }}</td>
        <td> <img src="{{ asset("$item->image") }}" style="width:70px; height:70px;" alt="client image" /> </td>  
        <td>{{ $item->status ? 'Hidden':'Visible'}}</td>
        <td>
            <a href="{{ url('admin/reviews/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ url('admin/reviews/'.$item->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data')" class="btn btn-danger btn-sm">Delete</a>
        </td>
</tr>
@endforeach

@else
<td>No Reviews Available</td>
@endif
</tbody>
</table>
</div>
</div>
</div>
</div>


@endsection
