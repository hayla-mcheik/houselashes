<!--== Start Header Wrapper ==-->
  <header class="header-area header-default header-style2">
    <!--== Start Header Top ==-->
    <div class="header-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 hidden-md-down">
            <div class="contact-email">
              <span>Email us: <a href="mailto:houselashes@gmail.com">houselashes@gmail.com</a></span>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 text-md-start text-lg-center text-center">
            <p>Additional 20% Off Sale Items</p>
          </div>
          <div class="col-md-6 col-lg-4 text-md-end text-center mt-sm-15">
            @guest
            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                Login/Register
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                @if (Route::has('login'))
                <li>
                  <a href="{{ url('login') }}">Login</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li>
                  <a href="{{ url('register') }}">Register</a>
                </li>
@endif


              </ul>
            </div>

            @elseif (auth()->user()->role_as == '1')
            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                {{ Auth::user()->name }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="{{ url('admin/dashboard') }}">My Dashboard</a>
                </li>
                <li >
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign Out</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </li>

              </ul>
            </div>
@else

            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                {{ Auth::user()->name }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="{{ url('account') }}">My account</a>
                </li>
       
                <li >
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign Out</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </li>

              </ul>
            </div>
            @endif
            <div class="theme-currency">
              <a class="dropdown-btn" href="#" role="button">
                EUR €
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="#/">EUR €</a>
                </li>
                <li>
                  <a href="#/">USD $</a>
                </li>
              </ul>
            </div>
            <div class="theme-language">
              <a class="dropdown-btn" href="#" role="button">
                <img src="{{ asset('assets/img/photos/language-01.jpg')}}" alt="Has-Image">English
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="#/"><img src="{{ asset('assets/img/photos/language-01.jpg')}}" alt="Has-Image">English</a>
                </li>
                <li>
                  <a href="#/"><img src="{{ asset('assets/img/photos/language-02.jpg')}}" alt="Has-Image">Italiano</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Top ==-->

    <!--== Start Header Middle ==-->
    <div class="header-middle hidden-md-down">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col col-md-4 col-sm-12">
            <div class="contact-link">
              <div class="contact-info">
                <span class="phone">Call Us: <a href="tel:+961922944">+96171922944</a></span>
                <div class="time-contact">5 Days a week from 4:00 am to 10:00 pm</div>
              </div>
            </div>
          </div>
          <div class="col col-md-4 col-sm-12">
            <div class="header-logo-area text-center">
              <a href="{{url('/') }}">
                <img class="logo-main" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                <img class="logo-light d-none" src="{{asset('assets/img/logo-light.png')}}" alt="Logo">
              </a>
            </div>
          </div>
          <div class="col col-md-4 col-sm-12">
            <div class="header-action-area float-end">
              <div class="search-content-wrap">
                <button class="btn-search">
                  <span class="icon icon-search icon-magnifier"></span>
                </button>
                <div class="btn-search-content">
                  <form action="{{ url('search') }}" method="GET" role="search">
                    <div class="form-input-item">
                      <input type="text" placeholder="Enter your search key ..."  value="{{ Request::get('search') }}" name="search">
                      <button type="submit" class="btn-src">
                        <i class="icon-magnifier"></i>
                      </button>
          
                    </div>
                  </form>
                </div>
              </div>
              <div class="shop-button-group">
       
                    <div class="shop-button-item">
                      <a class="shop-button" href="{{ url('wishlist') }}">
                        <i class="icon-heart icon"></i>
                        <sup class="shop-count"><livewire:frontend.wishlist-count /></sup>
                      </a>
                    </div>
                <div class="shop-button-item">
                  <a class="shop-button">
                    <i class="icon-bag icon"></i>
                    <sup class="shop-count"><livewire:frontend.cart.cart-count /></sup>
   
                  <livewire:frontend.cart.total-amount-cart />
                  </a>
                  <div class="popup-cart-content">
                    <livewire:frontend.cart.cart-items />
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Middle ==-->

    <!--== Start Header Bottom ==-->
    <div class="header-bottom sticky-header hidden-md-down">
      <div class="container">
        <div class="row align-items-center">
          <div class="col col-12 position-relative">
            <div class="header-align align-default justify-content-center">
              <div class="header-navigation-area hidden-md-down">
                <ul class="main-menu nav">
                  <li><a href="{{ url('/') }}">Home</a>
                      <li><a href="{{ url('aboutus') }}">About Us</a></li>
                      <li><a href="{{ url('collections')}}">Shop</a>
                 
                      <li><a href="{{ url('blogs')}}">Blog</a>           
                      </li>
                      <li><a href="{{ url('contactus') }}">Contact us</a></li>
                    </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Bottom ==-->

    <!--== Start Responsive Header ==-->
    <div class="responsive-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <div class="header-item">
              <button class="btn-menu" type="button"><i class="icon-menu"></i></button>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-center">
              <div class="header-logo-area">
                <a href="{{ url('/')}}">
                  <img class="logo-main" src="assets/img/logo.png" alt="Logo">
                </a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-end">
              <button class="btn-user" onclick="window.location.href='{{url('account') }}'"><i class="icon-user"></i></button>
              <button class="btn-cart" onclick="window.location.href='{{url('cart')}}'"><i class="icon-bag"></i> <span class="item-count"><livewire:frontend.cart.cart-count /></span></button>
            </div>
          </div>
          <div class="col-12">
            <div class="responsive-search-content">
              <form action="{{ url('search') }}" method="GET" role="search">
                <div class="form-input-item">
                  <input type="text" placeholder="Enter your search key ..."  value="{{ Request::get('search') }}" name="search">
                  <button type="submit" class="btn-src">
                    <i class="icon-magnifier"></i>
                  </button>
           
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Responsive Header ==-->
  </header>
  <!--== End Header Wrapper ==-->