<div class="product-action">
    <div class="addto-wrap">
      <a class="add-wishlist" title="Add to wishlist" wire:click="addToWishList({{ $product->id }})" style="background-color:{{$IsInWishlist ? '#f6f6f6' : '#f6f6f6' }};">
        <i class="icon-heart icon {{$IsInWishlist ? 'fa fa-heart' : 'icon-heart' }}" style="color:{{$IsInWishlist ? '#ec6b81' : '#000' }};" ></i>  
      </a>
    </div>
  </div>