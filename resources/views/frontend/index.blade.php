@extends('layouts.app')
@section('title','Home Page')
@section('content')




    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area">
        <div class="swiper-container swiper-pagination-style dots-bg-light home-slider-container default-slider-container">
          <div class="swiper-wrapper home-slider-wrapper slider-default">
            
            @foreach ($sliders as $key => $sliderItem)
            <div class="swiper-slide {{ $key == 0 ? 'active':''}}">
                @if ($sliderItem->image)
                <div class="slider-content-area" data-bg-img="{{ asset("$sliderItem->image") }}">
            @endif
  
                <div class="container">
                  <div class="row">
                    <div class="col-10 col-sm-6 col-md-5">
                      <div class="slider-content slider-content-light animate-flipInX">
                        <h5 class="sub-title transition-slide-0">{{ $sliderItem->title }}</h5>
                        <h2 class="title transition-slide-1 mb-0"><span class="font-weight-400">{{ $sliderItem->description }}</span></h2>
                        <a class="btn-slide transition-slide-3" href="{{url('collections') }}">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
          </div>
  
          <!--== Add Swiper Pagination ==-->
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <!--== End Hero Area Wrapper ==-->


    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container pb-lg-60">
          <div class="row">
            <div class="col-sm-8 m-auto">
              <div class="section-title text-center mb-30">
                <h2 class="title">Our Products</h2>
                <div class="desc">
                  <p>Add our products to weekly line up</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="product-tabs-content-wrap">
                    <ul class="nav mb-25 product-tab-nav" id="pills-tab" role="tablist">
                      @foreach ($categories as $category)
                        <li role="presentation">
                          <a class="nav-link @if ($loop->first) active @endif" id="{{ $category->slug }}-tab" data-bs-toggle="pill" href="#{{ $category->slug }}" role="tab" aria-controls="{{ $category->slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->name }}</a>
                        </li>
                      @endforeach
                    </ul>
                    <div class="tab-content product-tab-content" id="pills-tabContent">
                      @foreach ($categories as $category)
                        <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $category->slug }}" role="tabpanel" aria-labelledby="{{ $category->slug }}-tab">
                          <div class="row">
                            <div class="col-12">
                              <div class="product-slider owl-carousel owl-theme">
                                @foreach ($category->products as $product)
                                  <div class="item">
                                    <!--== Start Shop Item ==-->
                                    <div class="product-item">
                                      <div class="inner-content">
                                        <div class="product-thumb">
                                          <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                            @if($product->productImages->count() > 0)
                                            <img src="{{ asset($product->productImages[0]->image) }}" alt="product-img">                        
                                        <img class="second-image" src="{{ asset($product->productImages[1]->image ?? $product->productImages[0]->image) }}" alt="product-img">
                                    @endif 
                                          </a>
                               <livewire:frontend.indexwish :product="$product"/>


                                          <ul class="product-flag">
                                      
                                              <li class="new">
                                                @if ($product->quantity > 0)
                                                <span>In Stock</span>
                                            @else
                                              Out of Stock
                                            @endif
                                              </li>
                                       
                                              @if($product->original_price)
                                              @php
                                                $discount = (($product->original_price - $product->selling_price) / $product->original_price ) * 100;
                                              @endphp
                                            
                                              <li class="discount">-{{ round($discount , 0) }}%</li>
                                            @endif
                                          </ul>
                                        </div>
                                        <div class="product-desc">
                                          <div class="product-info">
                                            <h4 class="title"><a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">{{ $product->name }}</a></h4>
                                            <div class="star-content">
                                              @for ($i = 0; $i < 5; $i++)
                                                <i class="ion-md-star{{ $i < $product->rating ? '' : '-outline' }}"></i>
                                              @endfor
                                            </div>
                                            <div class="prices">
                                              <span class="price-old">€{{ $product->original_price }}</span>
                                              <span class="price">€{{ $product->selling_price }}</span>
                                            </div>
                                          </div>


                                 
                                          <div class="product-footer">
                                            <livewire:frontend.cart.add-to-cart :product="$product"/>
                                            <a class="btn-quick-view" href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">View Details</a>

                                          </div>

                                          
                                        </div>
                                      </div>
                                    </div>
                                    <!--== End Shop Item ==-->
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      @endforeach
                    </div>
                  </div>
                  
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->

  <!--== End Popup Product  ==-->
      <section class="divider-area divider-product-discount-area bg-img" data-bg-img="{{ asset('assets/img/slider-09.webp')}}" style="background-image: url(&quot;assets/img/photos/bg-01.jpg&quot;);">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="divider-style2-wrap">
                <div class="row">
                  <div class="col-xl-4">
                    <div class="divider-content">
                      <h5 class="sub-title">NATURAL SKINCARE</h5>
                      <h2 class="title">40% Off</h2>
                      <p>No Parabens. No Sulfates. No Compromises. Shop Clean Beauty.</p>
                      <a class="btn-theme btn-white" href="{{ url('collections') }}">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container pt-95 pt-lg-70">
          <div class="row">
            <div class="col-sm-8 m-auto">
              <div class="section-title text-center">
                <h2 class="title">Featured Products</h2>
                <div class="desc">
                  <p>Add our Featured Products to your weekly lineup</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="product-slider owl-carousel owl-theme">
                @if($featuredProducts)
                @foreach ($featuredProducts as $productItem)
                <div class="item">
                  <!--== Start Shop Item ==-->
                  <div class="product-item">
                    <div class="inner-content">
                      <div class="product-thumb">
                        @if($productItem->productImages->count() > 0)    
                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                            <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                            @if($productItem->productImages->count() > 1)
                                <img class="second-image" src="{{ asset($productItem->productImages[1]->image) }}" alt="{{ $productItem->name }}">
                            @endif
                        </a>
                    @endif
                    <livewire:frontend.indexwish :product="$product"/>

                        <ul class="product-flag">
                          <li class="new">
                            @if ($productItem->quantity > 0)
                            <span>In Stock</span>
                        @else
                          Out of Stock
                        @endif</li>
                        @if($productItem->original_price)
                        @php
                          $discount = (($productItem->original_price - $productItem->selling_price) / $productItem->original_price ) * 100;
                        @endphp
                      
                        <li class="discount">-{{ round($discount , 0) }}%</li>
                      @endif
                        </ul>
                      </div>
                      <div class="product-desc">
                        <div class="product-info">
                          <h4 class="title"><a href="single-product.html">{{ $productItem->small_description }}</a></h4>
                          <div class="star-content">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="ion-md-star{{ $i < $productItem->rating ? '' : '-outline' }}"></i>
                            @endfor
                        </div>
                        <div class="prices">
                            @if($productItem->original_price)
                                <span class="price-old">${{ $productItem->original_price }}</span>
                            @endif
                            <span class="price">${{ $productItem->selling_price }}</span>
                        </div>
                        @if ($productItem->quantity > 0)
                            <span class="product__badge product__badge_success">In Stock</span>
                        @else
                            <span class="product__badge">Out of Stock</span>
                        @endif
                        </div>
     
                        <div class="product-footer">
                          <livewire:frontend.cart.add-to-cart :product="$product"/>
                          <a class="btn-quick-view" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">View Details</a>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!--== End Shop Item ==-->
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->


 <!--== Start Testimonial Area Wrapper ==-->
 <section class="testimonial-area">
    <div class="container pt-110 pt-lg-70">
      <div class="row">
        <div class="col-sm-8 m-auto">
          <div class="section-title text-center">
            <h2 class="title">Client Testimonials</h2>
            <div class="desc">
              <p>What our happy customers says !</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="testimonials-slider testi-first-active owl-carousel owl-theme">
            @if($reviews)
            @foreach ($reviews as $item )
            <div class="item">
              <!--== Start Testimonial Item ==-->
              <div class="testimonial-item testi-height-style matchHeight">
                <div class="testi-inner-content">
                  <div class="testi-author">
                    <div class="testi-thumb">
                      <img src="{{ asset($item->image) }}" alt="Image-HasTech" class="img">
                    </div>
                    <div class="testi-info">
                        <span class="name">{{ $item->name }}</span>
                        <span class="email">{{ $item->title }}</span>
                    </div>
                  </div>
                  <div class="testi-content">
                    <p>    {{ $item->description }}</p>
                    <div class="testi-info">
                      <span class="name">{{ $item->name }}</span>
                      <span class="email">{{ $item->title }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <!--== End Testimonial Item ==-->
            </div>
            @endforeach
            @else
            <p>No Reviews Available</p>
@endif
      
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Testimonial Area Wrapper ==-->




    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area">
        <div class="container pt-95 pb-100 pt-lg-70 pb-lg-65">
          <div class="row">
            <div class="col-sm-8 m-auto">
              <div class="section-title text-center">
                <h2 class="title">Latest Blogs</h2>
                <div class="desc">
                  <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="blog-slider owl-carousel owl-theme">
                @foreach($blogs as $blog)
                <div class="item">
                  <!--== Start Blog Item ==-->
                  <div class="post-item">
                    <div class="inner-content">
                      <div class="thumb">
                        <a href="blog.html"><img src="{{ asset($blog->image) }}" class="img" alt="Image-HasTech"></a>
                      </div>
                      <div class="content">
                        <h4 class="title"><a href="single-blog.html">{{ words_limit($blog->description, 10) }}</a></h4>
                        <div class="meta">
                          <span>Posted by</span>
                          <a class="author" href="blog.html">{{ $blog->by }}</a>
                          <a class="date" href="blog.html">{{ $blog->date }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--== End Blog Item ==-->
                </div>
 @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Blog Area Wrapper ==-->



      
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
      <script>
        $(document).ready(function(){
          $('.btn-quick-vieww').click(function(){
            $('#exampleModal').modal('show');
          });
        });
      </script>
@endsection

@section('script')
<script>
  $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
  </script>

@endsection




