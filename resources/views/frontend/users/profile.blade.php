@extends('layouts.app')

@section('title','User Profile')
@section('content')
<div class="py-5 bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h4>User Profile
<a href="{{ url('change-password') }}" class="btn-signin float-end">Change Password ?</a>

        </h4>
        <div class="underline mb-4"></div>
</div>

<div class="col-md-10">

@if(session('message'))
<p class="alert alert-success">{{ session('message') }}</p>
@endif

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</ul>
@endif

               <div class="login-form-content">
              <div class="login-form m-4">
    <form action="{{ url('profile') }}" method="POST">
        @csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="{{ Auth::user()->name }}"  class="form-control" />
</div>
</div>

<div class="col-md-6">
        <div class="mb-3">
            <label>Email Address</label>
            <input type="text"  readonly value="{{ Auth::user()->email }}" class="form-control" />
</div>
</div>


<div class="col-md-6">
        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control" required/>
</div>
</div>



<div class="col-md-6">
        <div class="mb-3">
            <label>Address</label>
            <textarea  name="address" class="form-control" row="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
</div>
</div>

<div class="col-md-12 mb-4">
    <button type="submit" class="btn-signin">Save Data</button>
</div>

</div>
    </form>
</div>

</div>
</div>



</div>
</div>
</div>
@endsection