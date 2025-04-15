@extends('layouts.app')
@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

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
                <li>Products</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

                <livewire:frontend.product.index :category="$category" :categories="$categories" :inStockCount="$inStockCount" :outOfStockCount="$outOfStockCount" />

      


@endsection