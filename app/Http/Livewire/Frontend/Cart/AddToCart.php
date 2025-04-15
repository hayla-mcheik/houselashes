<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;




class AddToCart extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart($productId)
    {
        if (Auth::check()) {
            if(Auth::user()->role_as == '1')
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only User can add to cart',
                    'type' => 'warning',
                    'status' => 200
                ]);  
                return;
            }
            $product = Product::find($productId);

            if ($product && $product->status == '0') {
                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Already Added',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                } else {
                    if ($product->quantity > 0) {
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'quantity' => 1 // default quantity for the example
                        ]);
                        $this->emit('CartAddedUpdated');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Added to Cart',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Out of Stock',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not exist',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to add to cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.add-to-cart');
    }
}
