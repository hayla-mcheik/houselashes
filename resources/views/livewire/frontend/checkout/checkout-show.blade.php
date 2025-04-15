<div>
    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container" data-padding-top="62">
            <div class="shopping-cart-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping-checkout-content">
                            <div class="checkout-accordion" id="accordionExample">
                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingTwo">
                                        <button class="heading-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="step-number">1</span>
                                            Personal Information
                                            <span class="step-edit"><i class="fa fa-pencil"></i> edit</span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body" data-margin-top="14">
                                            <div class="personal-addresses">
                                                <p class="p-text">The selected address will be used both as your personal address (for invoice) and as your delivery address.</p>
                                                <div class="personal-information">
                                                    <ul>
                                                        <li>Not you? <a href="#/">Log out</a></li>
                                                        <li><small>If you sign out now, your cart will be emptied.</small></li>
                                                    </ul>
                                                </div>
                                                <div class="delivery-address-form">
                                                    <form wire:submit.prevent="validatePersonalInformation">
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="f_name">First name</label>
                                                            <div class="col-md-6">
                                                                <input id="f_name" wire:model.defer="fullname" class="form-control" type="text">
                                                                @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="frm_address">Address</label>
                                                            <div class="col-md-6">
                                                                <input id="frm_address" wire:model.defer="address" class="form-control" type="text">
                                                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="frm-phone">Phone</label>
                                                            <div class="col-md-6">
                                                                <input id="frm-phone" wire:model.defer="phone" class="form-control" type="tel">
                                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="frm-email">Email</label>
                                                            <div class="col-md-6">
                                                                <input id="frm-email" wire:model.defer="email" class="form-control" type="email">
                                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12 text-end">
                                                                <button type="submit" class="btn-submit">Continue</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingThree">
                                        <button class="heading-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" @if(!$isPersonalInfoValid) disabled @endif>
                                            <span class="step-number">3</span>
                                            Payment
                                            <span class="step-edit"><i class="fa fa-pencil"></i> edit</span>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body" data-margin-top="14">
                                            <div class="personal-addresses">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr/>
                                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Place Order (Cash on Delivery)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Placing Order
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shopping-checkout-disabled">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-9 ml-1">
                            <p>If you have a promo code, please enter the code to get a discount.</p>
                            <div class="promocode d-flex justify-content-between">
                                <div class="form-group">
                                    <input class="form-control promocode" wire:model="promoCode" type="text" name="promocode" placeholder="Discount Code" />
                                </div>
                                <div class="btn btn-promocode-apply" wire:click="applyPromoCode" type="button">Apply</div>
                            </div>
                        </div>
                        @if($promoCodeApplied)
                            <div class="border-promocode m-2">
                                <span class="applied-promo-code mt-4" style="background-color: #f0808029; padding: 10px; font-weight: 600;">
                                    Promo Code: <i class="fa fa-tag"></i> {{ $promoCode }}
                                </span>
                            </div>
                        @endif
                        @if($totalProductAmount != 0)
                            <div class="shopping-cart-summary mt-md-70 mt-2">
                                <div class="cart-detailed-totals">
                                    <div class="card-block">
                                        <div class="card-block-item">
                                            {{-- <span class="label">2 items</span> --}}
                                        </div>
                                        <div class="card-block-item">
                                            <span class="label">show details</span>
                                        </div>
                                        <div class="card-block-item">
                                            <span class="label">Subtotal</span>
                                            <span class="value">${{ $totalProductAmount }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
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
    <!--== End Product Area Wrapper ==-->
</div>
