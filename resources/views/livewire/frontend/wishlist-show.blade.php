<div>


    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container" data-padding-top="62">
          <div class="shopping-wishlist-wrap">
            <div class="row">
              <div class="col-12">
                <div class="wishlist-content">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="item-name">Name</th>
                          <th class="item-created">Price</th>
                          <th class="item-direct-link">Direct Link</th>
                          <th class="item-delete">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($wishlist as $wishlistItem)
@if($wishlistItem->product)
                        <tr>
                          <td class="item-name">
                            <span>              <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                <label class="product-name">
                                    <img src="{{ $wishlistItem->product->productImages[0]->image }}" 
                                    style="width: 50px; height: 50px" alt="{{ $wishlistItem->product->name }}">
                             {{ $wishlistItem->product->name }}
                                </label></span>
                          </td>
                    
                   
                          <td class="item-created">
                            <span>${{ $wishlistItem->product->selling_price }}</span>
                          </td>
                          <td class="item-direct-link">
                            <span><a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">View</a></span>
                          </td>
                 
                          <td class="item-delete">
                            <span><a wire:click="removeWishlistItem({{ $wishlistItem->id }})"><i class="fa fa-trash"></i></a></span>
                          </td>
                        </tr>
                
                        @endif   
                        @empty
<tr>
  <td colspan="4">No Wishlist Added</td>
</tr>
@endforelse    
                      </tbody>
                    </table>
                  </div>
                  <div class="wishlist-footer">
                    <a href="{{ url('account') }}" class="btn-wishlist">Back to Your Account</a>
                    <a href="{{ url('/') }}" class="btn-wishlist">Home</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->
</div>