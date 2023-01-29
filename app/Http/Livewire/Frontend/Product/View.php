<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $product;
    public $category;
    public $productColorSelectedQuantity;
    public function mount($category, $product)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function selectedColor($color)
    {
        $productColor = $this->product->productColors()->where('id', $color)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;
        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outOfStock';
        } 
    }
    public function render()
    {
        return view('livewire.frontend.product.view', ['products' => $this->product, 'category' => $this->category]);
    }
}
