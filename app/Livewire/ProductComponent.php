<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $products;
    public $id;
    public $selectedProduct = null;

    public function selectProduct($productId)
    {
        $this->selectedProduct = Product::find($productId);
    }
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-component');
    }
}
