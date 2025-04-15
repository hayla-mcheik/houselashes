<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TotalAmountCart extends Component
{
    public $totalcartamount = 0;
   
    protected $listeners = ['CartAddedUpdated' => 'checkCartTotalAmount'];

    public function mount()
    {
        $this->checkCartTotalAmount();
    }

    public function checkCartTotalAmount()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', auth()->user()->id)->get();
            $this->totalcartamount = $carts->sum(function($cart) {
                return $cart->product->selling_price * $cart->quantity;
            });
        } else {
            $this->totalcartamount = 0;
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.total-amount-cart',[
            'totalcartamount' => $this->totalcartamount
        ]);
    }
}
