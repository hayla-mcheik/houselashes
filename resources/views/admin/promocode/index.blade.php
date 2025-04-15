@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

                <div class="card">
                    <div class="card-header">
    
</div>

<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>Valid from</th>
            <th>Valid to</th>
            <th>Action</th>
</tr>
</thead>
<tbody>

@foreach($promocode as $code)
<tr>
    <td>{{ $code->id }}</td>
    <td>{{ $code->code }}</td>
    <td>{{ $code->valid_from }}</td>
    <td>{{ $code->valid_to }}</td>
    <td>
        <a href="{{ url('admin/promocode/edit/'.$code->id) }}" class="btn btn-success" >Edit</a>
    </td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>
</div>
</div>


@endsection
