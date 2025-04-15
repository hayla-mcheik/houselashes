<div>
    <ul class="popup-product-list">
        @forelse($carts->take(2) as $cart)
            <li class="product-list-item">
                @php
                    $firstImage = $cart->product->productImages->first();
                @endphp
                @if($firstImage)
                    <a>
                        <img src="{{ asset($firstImage->image) }}" alt="Image-HasTech">
                        <span class="product-title">{{ $cart->product->name }}</span>
                        <span class="product-quantity">{{ $cart->quantity }}x</span>
                    </a>
                @endif
                <span class="product-price">${{ $cart->product->selling_price }}</span>
                <a class="product-close" href="#" wire:click.prevent="removeCartItem({{ $cart->id }})"><i class="la la-close"></i></a>
            </li>
        @empty
            <li class="m-4"><span class="product-title">Cart is empty</span></li>
        @endforelse
    </ul>

    @if($cartCount > 0)
        <div class="checkout mt-2">
            <a href="{{ url('cart') }}" class="btn-Checkout">View All Items in Cart</a>
        </div>
        <div class="price-content">
            <div class="cart-total">
                <span class="label">Total</span>
                <span class="value">${{ $totalAmount }}</span>
            </div>
        </div>
        <div class="checkout">
            <a href="{{ url('checkout') }}" class="btn-Checkout">Checkout</a>
        </div>
    @endif
</div>
