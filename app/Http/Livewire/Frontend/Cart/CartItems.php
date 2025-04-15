<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartItems extends Component
{
    public $carts;
    public $totalAmount;
    public $cartCount;
    protected $listeners = ['CartAddedUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $this->cartCount = Cart::where('user_id',auth()->user()->id)->count();
            $this->carts = Cart::where('user_id', auth()->user()->id)->with('product.productImages')->get();
            $this->totalAmount = $this->carts->sum(function($cart) {
                return $cart->product->selling_price * $cart->quantity;
            });
        } else {
            // Handle the case where the user is not authenticated
            $this->carts = collect(); // An empty collection
            $this->totalAmount = 0;
        }
    }

    public function removeCartItem($cartId)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->delete();
            $this->emit('CartAddedUpdated');
            $this->updateCart();
        }
    }

    public function render()
    {
 
        return view('livewire.frontend.cart.cart-items', [
            'carts' => $this->carts,
            'totalAmount' => $this->totalAmount,
            'cartCount' => $this->cartCount,
        ]);
    }
}
