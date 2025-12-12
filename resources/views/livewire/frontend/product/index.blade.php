<div>

            <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container pb-55">
          <div class="row">
            <div class="col-lg-3 order-1 order-lg-1">
              <!--== Start Sidebar Area ==-->
              <div class="shop-sidebar-wrapper">
                <!--== Start Sidebar Item ==-->
                <div class="sidebar-item">
                  <h4 class="sidebar-title"><a href="shop-left-sidebar.html">All Categories</a></h4>
                  <div class="sidebar-body">
                    <div class="category-sub-menu">
                      <ul>
                        @forelse($categories as $categoryItem)
                        <li>
                          <a href="#/">{{$categoryItem->name}}</a>
                          <span class="collapse-icons collapsed" data-bs-toggle="collapse" data-bs-target="#sub-menu-{{ $categoryItem->id }}" role="button" aria-expanded="false">
                            <i></i>
                          </span>
                          <ul class="collapse" id="sub-menu-{{ $categoryItem->id }}">
                            @forelse($categoryItem->products as $product)
                            <li><a href="#/">{{ $product->name }}</a></li>
                            @empty
                            <li>No Product in this category</li>
                            @endforelse
                          </ul>
                        @empty
                        <li>No Categories</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                  {{-- <h4 class="sidebar-title mb-45">Filter By</h4> --}}
                </div>
                <!--== End Sidebar Item ==-->
  
                <!--== Start Sidebar Item ==-->
                {{-- <div class="sidebar-item mb-40">
                  <h4 class="small-title">Price</h4>
                  <div class="sidebar-body">
                    <div class="sidebar-menu-list">
                      <div class="list-item">
                        <label class="d-block">
                           <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> High to Low
                        </label>
                     </div>
                     <div class="list-item">
                        <label class="d-block">
                           <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Low to High
                        </label>
                     </div>
                     
                    </div>
                  </div>
                </div> --}}
                <!--== End Sidebar Item ==-->
  
                <!--== Start Sidebar Item ==-->
                <div class="sidebar-item mb-40">
                  <h4 class="small-title">Availability</h4>
                  <div class="sidebar-body">
                    <div class="sidebar-menu-list">
                      <div class="list-item">
                        <label class="form-check-label" for="list9">In Stock ({{ $inStockCount }})</label>
                      </div>
                      <div class="list-item">
                        <label class="form-check-label" for="list10">Not available ({{ $outOfStockCount }})</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!--== End Sidebar Item ==-->


              </div>
              <!--== End Sidebar Area ==-->
            </div>
            <div class="col-lg-9 order-0 order-lg-2">
              <!--== Start Shop Area ==-->
              <div class="product-header-wrap">
                <div class="row">
                  <div class="col-4 col-sm-4 col-md-6">
                    <ul class="nav product-tab-nav" id="pills-tab" role="tablist">
                      <li role="presentation">
                        <a class="active" id="grid-tab" data-bs-toggle="pill" href="#grid" role="tab" aria-controls="grid" aria-selected="true"><i class="fa fa-th"></i></a>
                      </li>
                      <li role="presentation">
                        <a id="list-care-tab" data-bs-toggle="pill" href="#list-care" role="tab" aria-controls="list-care" aria-selected="false"><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="total-products">

                      <p class="hidden-sm-down">There are {{ $category->products_count }} products.</p>
                    </div>
                  </div>
                  <div class="col-8 col-sm-8 col-md-6">
                    <div class="row">
                      {{-- <div class="col-sm-3">
                        <div class="sort-by-text">
                          Sort By:
                        </div>
                      </div> --}}
                      {{-- <div class="col-sm-9">
                        <div class="sort-by-form">
                          <select class="form-select" aria-label="Relevance">
                            <option selected="">Relevance</option>
                            <option value="1">Name, A to Z</option>
                            <option value="2">Name, Z to A</option>
                            <option value="3">Price, low to high</option>
                            <option value="4">Price, high to low</option>
                          </select>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-body-wrap">
                <div class="tab-content product-tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <div class="row">
                        @forelse ($products as $productItem)
                      <div class="col-sm-6 col-md-4">
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

                              <div class="product-action">
                                <div class="addto-wrap">
                                  <a class="add-wishlist" title="Add to wishlist" wire:click="addToWishList({{ $productItem->id }})" style="background-color:{{$IsInWishlist ? '#f6f6f6' : '#f6f6f6' }};">
                                    <i class="icon-heart icon {{$IsInWishlist ? 'fa fa-heart' : 'icon-heart' }}" style="color:{{$IsInWishlist ? '#ec6b81' : '#000' }};" ></i>  
                                  </a>
                                </div>
                              </div>
                              <ul class="product-flag">
                                <li class="new">
                                  @if ($productItem->quantity > 0)
                                  <span>In Stock</span>
                              @else
                                Out of Stock
                              @endif</li>
                                <li class="discount">-10%</li>
                              </ul>
                            </div>
                            <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">{{ $productItem->small_description }}</a></h4>
                       
                                <div class="prices">
                                    @if($productItem->original_price)
                                        <span class="price-old">${{ $productItem->original_price }}</span>
                                    @endif
                                    <span class="price">${{ $productItem->selling_price }}</span>
                                </div>
                   <a class="btn-product-add" wire:click="addToCart({{ $productItem->id }})">Add to cart</a>
                                </div>
                
                      
                              </div>                          </div>
                        </div>
                        <!--== End Shop Item ==-->
                      </div>
         @empty
         <div class="col-sm-6 col-md-4">
            <div><p>No Products Available</p></div>
         </div>
         @endforelse
                    </div>
                  </div>
             
                </div>
                {{-- <div class="row">
                  <div class="col-12">
                    <div class="pagination-content-wrap">
                      <nav class="pagination-nav">
                        <ul class="pagination justify-content-center">
                          <li><a class="active" href="#/">1</a></li>
                          <li><a href="#/">2</a></li>
                          <li><a href="#/"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div> --}}
              </div>
              <!--== End Shop Area ==-->
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->