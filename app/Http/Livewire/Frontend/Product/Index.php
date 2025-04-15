<?php

namespace App\Http\Livewire\Frontend\Product;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;

class Index extends Component
{
    
public $productItem;
    public $products , $category ,$categories, $brandInputs = [] , $priceInput;

    public $inStockCount , $outOfStockCount;
    
public $IsInWishlist = false;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
];
public function mount($category, $categories)
{
    $this->products = Product::all();
    $this->category = $category;
    $this->categories = $categories;

    if (Auth::check()) {
        // Ensure $this->productItem is set and not null before accessing its id
        if (isset($this->productItem)) {
            $this->IsInWishlist = Wishlist::where('user_id', auth()->user()->id)
                ->where('product_id', $this->productItem->id)
                ->exists();
        } else {
            $this->IsInWishlist = false; // Or handle this scenario as needed
        }
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


public function addToCart(int $productId)
{
    if(Auth::check())
    {
        if(Auth::user()->role_as == '1')
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Only User can add to cart',
                'type' => 'warning',
                'status' => 200
            ]);  
            return;
        }
// dd($productId);
if(Product::where('id', $productId)->where('status', '0')->exists())

{

    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
    {
        $this->dispatchBrowserEvent('message' , [
            'text' => 'Product Already Added',
            'type' => 'warning',
            'status' => 200
        ]);
    }
    else
    {
        $product = Product::find($productId);
        if($product && $product->quantity > 0)
        
    {

                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
                $this->emit('CartAddedUpdated');
                $this->dispatchBrowserEvent('message' , [
                    'text' => 'Product Added to Cart',
                    'type' => 'success',
                    'status' => 200
                ]);
        
     
    }
    else
    {
        $this->dispatchBrowserEvent('message' , [
            'text' => 'Out of Stock',
            'type' => 'warning',
            'status' => 404
        ]);
    }
}

}
else
{
    $this->dispatchBrowserEvent('message' , [
        'text' => 'Product Doest not exists',
        'type' => 'warning',
        'status' => 404
    ]);
}
    }
    else 
    {
        $this->dispatchBrowserEvent('message' , [
            'text' => 'Please Login to add to cart',
            'type' => 'info',
            'status' => 401
        ]);
    }
}




    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
        ->when($this->brandInputs , function($q){
            $q->whereIn('brand', $this->brandInputs);
        })       
        ->when($this->priceInput , function($q){

            $q->when($this->priceInput == 'high-to-low' , function($q2){
                $q2->orderBy('selling_price','DESC');
            })
            ->when($this->priceInput == 'low-to-high' , function($q2){
                $q2->orderBy('selling_price','Asc');
            });
        })   
        ->where('status','0')->get();
        return view('livewire.frontend.product.index' , [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
