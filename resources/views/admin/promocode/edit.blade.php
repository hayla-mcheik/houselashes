@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
         @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Slider
                            <a href="{{ url('admin/promocode/') }}" class="btn btn-danger text-white btn-sm float-end">
                                Back</a></h4>
</div>

<div class="card-body">
<form action="{{ url('admin/promocode/'.$code->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Code</label>
        <input type="text" name="code" value="{{ $code->code }}" class="form-control">
</div>


<div class="mb-3">
    <label>Valid From</label>
    <input type="date" name="valid_from" value="{{ $code->valid_from }}" class="form-control">
</div>


<div class="mb-3">
    <label>Valid To</label>
    <input type="date" name="valid_to" value="{{ $code->valid_to }}" class="form-control">
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
