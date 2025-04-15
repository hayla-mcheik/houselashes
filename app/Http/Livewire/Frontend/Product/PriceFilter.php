<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
class PriceFilter extends Component
{
    public $minPrice;
    public $maxPrice;
    public $selectedMinPrice;
    public $selectedMaxPrice;


    public function mount()
    {
        $this->minPrice = Product::min('selling_price');
        $this->maxPrice = Product::max('selling_price');
        $this->selectedMinPrice = $this->minPrice;
        $this->selectedMaxPrice = $this->maxPrice;
    }

    public function updatedSelectedMinPrice()
    {
        $this->filterProducts();
    }

    public function updatedSelectedMaxPrice()
    {
        $this->filterProducts();
    }

    public function filterProducts()
    {
        $this->emit('priceRangeUpdated', $this->selectedMinPrice, $this->selectedMaxPrice);
    }

    public function render()
    {
        return view('livewire.frontend.product.price-filter');
    }
}
