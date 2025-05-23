<?php

namespace App\Http\Livewire\Frontend\Cart;
use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{

public $cart , $totalPrice = 0;

public function decrementQuantity(int $cartId)
{
    $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
    if ($cartData) {
        if ($cartData->quantity > 1) {
            if ($cartData->product->selling_price >= 1) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product price must be at least $1',
                    'type' => 'error',
                    'status' => 400
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity cannot be less than 1',
                'type' => 'error',
                'status' => 400
            ]);
        }
    } else {
        $this->dispatchBrowserEvent('message', [
            'text' => 'Something Went Wrong!',
            'type' => 'error',
            'status' => 404
        ]);
    }
}

public function incrementQuantity(int $cartId)
{
    $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
    if ($cartData) {
        if ($cartData->product->selling_price >= 1) {
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only ' . $cartData->product->quantity . ' Quantity Available',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product price must be at least $1',
                'type' => 'error',
                'status' => 400
            ]);
        }
    } else {
        $this->dispatchBrowserEvent('message', [
            'text' => 'Something Went Wrong!',
            'type' => 'error',
            'status' => 404
        ]);
    }
}



public function removeCartItem(int $cartId)
{
$cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id',$cartId)->first();
if($cartRemoveData)
{
    $cartRemoveData->delete();
    $this->emit('CartAddedUpdated');
    $this->dispatchBrowserEvent('message' , [
        'text' => 'Cart Item Removed Successfully',
        'type' => 'success',
        'status' => 200
    ]);
}
else{
    $this->dispatchBrowserEvent('message' , [
        'text' => 'Something Went Wrong',
        'type' => 'error',
        'status' => 500
    ]);
}
}

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
