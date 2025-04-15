<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
class QuickViewModal extends Component
{
    public $product;
    public $showModal = false;

    protected $listeners = ['showQuickViewModal'];

    public function showQuickViewModal($productId)
    {
        $this->product = Product::with('productImages')->find($productId);
        if($this->product) {
            logger()->info("Product found: " . $this->product->name); // Add this line for debugging
        } else {
            logger()->info("Product not found"); // Add this line for debugging
        }
        $this->showModal = true;
    }
    

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.frontend.product.quick-view-modal');
    }
}
