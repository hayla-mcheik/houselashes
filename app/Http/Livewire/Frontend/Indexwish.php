<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
class Indexwish extends Component
{
    public $product;
    public $IsInWishlist = false;

    public function mount()
    {
        if (Auth::check()){
            $this->IsInWishlist = Wishlist::where('user_id',auth()->user()->id)
            ->where('product_id', $this->product->id)->exists();
        }
    }
    public function addToWishList($productId)
{
// dd($productId);
if(Auth::check())
{

if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
{
session()->flash('message','Already added to wishlist');

$this->dispatchBrowserEvent('message' , [
    'text' => 'Already added to wishlist',
    'type' => 'warning',
    'status' => 409
]);
return false;
}
else 
{
Wishlist::create([
    'user_id' => auth()->user()->id,
    'product_id' => $productId,
]);
$this->IsInWishlist = true;
$this->emit('wishlistAddedUpdated');
session()->flash('message','Wishlist Added successfully');

$this->dispatchBrowserEvent('message' , [
    'text' => 'Wishlist Added successfully',
    'type' => 'success',
    'status' => 200
]);
}
}
else 
{
    session()->flash('message','Please Login to Continue');

    $this->dispatchBrowserEvent('message' , [
        'text' => 'Please Login to Continue',
        'type' => 'info',
        'status' => 401
    ]);
    return false;
}
}

    public function render()
    {
        return view('livewire.frontend.indexwish');
    }
}
