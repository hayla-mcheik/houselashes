@extends('layouts.app')
@section('title','About Us')

@section('content')

    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/bg-02.webp')}}">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="page-header-content">
                <nav class="breadcrumb-area">
                  <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                    <li>About us</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
  
      <!--== Start About Area Wrapper ==-->
      <section class="about-area about-page-area">
        <div class="container">
          <div class="row about-page-wrap">
            <div class="col-md-6">
              <div class="about-content">
                <h3 class="title">Cartic Story, We Craft Awesome Stuff With Great Experiences.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor</p>
                <a class="btn-theme" href="{{ url('contactus') }}">Contact Us</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="about-thumb">
                <img src="{{ asset('assets/img/about/01.jpg')}}" alt="Image-HasTech" class="img">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End About Area Wrapper ==-->
  
      <!--== Start Feature Area Wrapper ==-->
      <div class="feature-area feature-about-area position-relative z-index-1">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="feature-icon-box-style2">
                <div class="inner-content">
                  <div class="icon-box">
                    <img src="assets/img/icons/f01.png" alt="Image-HasTech" class="icon-img">
                  </div>
                  <div class="content">
                    <h5 class="title">Free Shipping</h5>
                    <p>Provide free home delivery <br>for all product over $100</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="feature-icon-box-style2">
                <div class="inner-content">
                  <div class="icon-box">
                    <img src="{{ asset('assets/img/icons/f02.png')}}" alt="Image-HasTech" class="icon-img">
                  </div>
                  <div class="content">
                    <h5 class="title">Online Support</h5>
                    <p>To satisfy our customer we <br>try to give support online</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="feature-icon-box-style2">
                <div class="inner-content">
                  <div class="icon-box">
                    <img src="assets/img/icons/f03.png" alt="Image-HasTech" class="icon-img">
                  </div>
                  <div class="content">
                    <h5 class="title">Secure Payment</h5>
                    <p>We ensure our product Good <br>quality all times</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="shape-group">
          <div class="shape-img1">
            <img src="{{ asset('assets/img/shape/01.png')}}" alt="Image">
          </div>
          <div class="shape-img2">
            <img src="{{ asset('assets/img/shape/02.png')}}" alt="Image">
          </div>
        </div>
      </div>
      <!--== End Feature Area Wrapper ==-->
@endsection