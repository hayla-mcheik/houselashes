@extends('layouts.app')
@section('title','All Categories')
@section('content')
<div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/bg-02.webp') }}">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="page-header-content">
            <nav class="breadcrumb-area">
              <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                <li>All Categories</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="all-categories pt-5">
        <div class="container pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-12">
                    <h4 class="mb-4 mt-5">Our Categories</h4>
                </div>

@forelse($categories as $categoryItem)


                <div class="col-6 col-md-4 mt-4 pb-4">
                    <div class="category-card">
                        <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                            <div class="category-card-img">
                                <img src="{{ asset("$categoryItem->image") }}" class="w-100" alt="Laptop">
                            </div>
                            <div class="category-card-body pt-2 pb-2 d-flex justify-content-center align-items-center">
                                <h5 class="">{{$categoryItem->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty

                <div class="col-md-12">
                    <h5>No Categories Available</h5>
</div>
                @endforelse
            </div>
        </div>
    </div>

@endsection