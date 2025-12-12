  <!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!--== Start Footer Widget Area ==-->
          <div class="footer-widget-area pb-30">
            <div class="row">
              <div class="col-lg-6">
                <div class="widget-item">
                  <div class="about-widget">
                    <div class="inner-content">
                      <div class="footer-logo">
                        <a href="{{ url('/') }}">
                          <img class="logo-light" src="{{ asset('assets/img/logo-light.png')}}" alt="Logo">
                        </a>
                      </div>
                      <p>{{ $appSetting->address ?? 'Beirut,lebanon ' }}</p>
                    </div>
                    <div class="widget-desc">
                      <p>{{ $appSetting->meta_description ?? 'Corporate clients and leisure travelers has been relying on Groundlink for dependable safe, and professional ' }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="widget-item">
                  <div class="widget-menu-wrap">
                    <ul class="nav-menu">
                      <li><a href="{{ url('aboutus') }}">Why Lakanto MonkFruit</a></li>
                      <li><a href="{{ url('contactus') }}">Contact us</a></li>
                      <li><a href="{{ url('blogs') }}">Health News</a></li>
                      <li><a href="{{ url('collections') }}">Stores</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--== End Footer Widget Area ==-->
        </div>
      </div>
    </div>
    <!--== Start Footer Bottom Area ==-->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="copyright">Copyright © 2025 All Rights Reserved | Made with <i class="fa fa-heart-o"></i> by <a target="_blank" href="https://www.hayla.site">__Hayla.</a></p>
          </div>
          <div class="col-lg-6">
            <div class="payment">
              <img src="{{ asset('assets/img/photos/payment.png')}}" alt="Payment">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom Area ==-->
  </footer>
  <!--== End Footer Area Wrapper ==-->