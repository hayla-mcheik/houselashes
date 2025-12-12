
@extends('layouts.app')
@section('title','Contact Us')

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
                    <li>Contact us</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
  
      <!--== Start Contact Area Wrapper ==-->
      <section class="contact-area contact-page-area">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="container">
          <div class="row contact-page-wrapper">
            <div class="col-lg-6">
              <div class="contact-form-wrap">
                <div class="contact-form-title">
                  <h5 class="sub-title">Don’t worry!</h5>
                  <h2 class="title">If you have any query? Contact with us.</h2>
                </div>
                <!--== Start Contact Form ==-->
                <div class="contact-form">
                  <form id="contact-form" action="{{ url('contact/submit') }}" method="POST">
                    @csrf
                    <div class="row row-gutter-20">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="tel" name="phone" placeholder="Phone">
                        </div>
                      </div>
         

                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="text" name="subject" placeholder="Subject">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb--0">
                          <textarea class="form-control" name="message" placeholder="Message"></textarea>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb--0">
                          <button class="btn-theme" type="submit">Submit Now</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!--== End Contact Form ==-->
  
                <!--== Message Notification ==-->
                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-info-list">
                <div class="contact-info">
                  <div class="info-item">
                    <div class="info">
                      <h5 class="title">Phone:</h5>
                      <p>
                        <a href="tel:(800) 513-7936">(800) 513-7936</a>
                      </p>
                    </div>
                  </div>
                  <div class="info-item">
                    <div class="info">
                      <h5 class="title">Email:</h5>
                      <p>
                        <a href="mailto:info@lakanto.me">info@lakanto.me</a>
                      </p>
                    </div>
                  </div>
                  <div class="info-item">
                    <div class="info">
                      <h5 class="title">Address:</h5>
                      <p>Saraya Middle East Trading
DMCC Business Center -
Unit No. 46 - Gold Tower,
Lake Level - Jumeirah Towers -
Dubai, UAE</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Contact Area Wrapper ==-->
      @endsection