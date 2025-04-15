<section class="product-area">
    <div class="container" data-padding-top="62">
        <div class="shopping-cart-wrap">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping-cart-content">
                        <h4 class="title">Shopping Cart</h4>
                        @php $totalPrice = 0; @endphp
                        @forelse($cart as $cartItem)
                            @if ($cartItem->product)
                                @if ($cartItem->product->selling_price >= 1)
                                    <div class="shopping-cart-item">
                                        <div class="row">
                                            <div class="col-4 col-md-3">
                                                <div class="product-thumb">
                                                    <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                        @if($cartItem->product->productImages)
                                                            <img class="border-radius-5" src="{{ asset($cartItem->product->productImages[0]->image) }}" alt="cart-product">
                                                        @else
                                                            <img src="" style="width: 50px; height: 50px" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-content">
                                                    <h5 class="title"><a href="single-product.html">{{ $cartItem->product->name }}</a></h5>
                                                    <h6 class="product-price">${{ $cartItem->product->selling_price }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-6 offset-4 offset-md-0 col-md-5">
                                                <div class="product-info">
                                                    <div class="row">
                                                        <div class="col-md-10 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6 qty">
                                                                    <div class="product-quick-qty">
                                                                        <div class="quantity__box">
                                                                            <button type="button" class="quantity__value quickview__value--quantity decrease" wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})">-</button>
                                                                            <label>
                                                                                <input type="number" class="quantity__number quickview__value--number" value="{{ $cartItem->quantity }}" data-counter />
                                                                            </label>
                                                                            <button type="button" class="quantity__value quickview__value--quantity increase" wire:loading.attr="disabled" wire:click="incrementQuantity({{ $cartItem->id }})">+</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xs-2 price">
                                                                    <h6 class="product-price">${{ $cartItem->product->selling_price * $cartItem->quantity }}</h6>
                                                                    @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-xs-2 text-end">
                                                            <div class="product-close"><a href="#" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id }})"><i class="ion-md-trash"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-danger">
                                        The product price must be at least $1.
                                    </div>
                                @endif
                            @endif
                        @empty
                            <div class="shopping-cart-item">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <p>Cart is empty</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                        <a class="btn-primary" href="{{ url('collections') }}">Continue shopping</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="shopping-cart-summary mt-md-70">
                        <div class="cart-detailed-totals">
                            <div class="card-block">
                                <div class="card-block-item">
                                    <span class="label">{{ $cart->sum('quantity') }} items</span>
                                    <span class="value">${{ $totalPrice }}</span>
                                </div>
                                <div class="card-block-item">
                                    <span class="label">Shipping</span>
                                    <span class="value">Free</span>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="card-block">
                                <div class="card-block-item">
                                    <span class="label">Total (Tax Incl.)</span>
                                    <span class="value">${{ $totalPrice }}</span>
                                </div>
                            </div>
                            <div class="separator"></div>
                        </div>
                        @if($totalPrice > 0)
                        <div class="checkout-shopping">
                            <a class="btn-checkout" href="{{ url('checkout') }}">Proceed to checkout</a>
                        </div>
                        @endif
                    </div>
                    <div class="block-reassurance">
                        <ul>
                            <li>
                                <img src="assets/img/shop/cart/verified-user.png" alt="Has-Image">
                                <span>Security Policy (Edit With Customer Reassurance Module)</span>
                            </li>
                            <li>
                                <img src="assets/img/shop/cart/local-shipping.png" alt="Has-Image">
                                <span>Delivery Policy (Edit With Customer Reassurance Module)</span>
                            </li>
                            <li>
                                <img src="assets/img/shop/cart/swap-horiz.png" alt="Has-Image">
                                <span>Return Policy (Edit With Customer Reassurance Module)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  