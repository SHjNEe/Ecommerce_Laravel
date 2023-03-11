<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $product;
    public $category;
    public $productColorSelectedQuantity;
    public $quantityCount = 1;
    public  $productColor;
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

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                if ($this->product->productColors()->count() > 1) {
                    if ($this->productColorSelectedQuantity != NULL) {
                        $productColor = $this->product->productColors()->where('id', $productId)->first();
                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->where('product_color_id', $productColor->id)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'This product already added !!',
                                'type' => 'warning',
                                'status' => 401
                            ]);
                            return false;
                        }
                        if ($productColor->quantity > 0) {
                            if ($this->product->quantity > $this->quantityCount) {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'product_color_id' => $productColor->id,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedOrUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'This product is added in to cart!!',
                                    'type' => 'success',
                                    'status' => 201
                                ]);
                                return false;
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'This product is not enough !!',
                                    'type' => 'warning',
                                    'status' => 401
                                ]);
                                return false;
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'This product is not enough !!',
                                'type' => 'warning',
                                'status' => 401
                            ]);
                            return false;
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your product color !!',
                            'type' => 'warning',
                            'status' => 401
                        ]);
                        return false;
                    }
                } else {
                    if ($this->product->quantityCount > 0) {
                        if ($this->product->quantity > $this->quantityCount) {
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'This product is not enough !!',
                                'type' => 'warning',
                                'status' => 401
                            ]);
                            return false;
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This product is not existed!',
                    'type' => 'warning',
                    'status' => 401
                ]);
                return false;
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please log in to continue !',
                'type' => 'warning',
                'status' => 401
            ]);
        }
    }


    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This item is existed in wishlist!',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId

                ]);
                $this->emit('wishlistAddedOrUpdated');
                // session()->flash('status', 'This item was  added to wishlist!');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'This item was  added to wishlist!',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            // session()->flash('status', 'Please log in to continue !');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please log in to continue !',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.view', ['products' => $this->product, 'category' => $this->category, 'quantityCount' => $this->quantityCount]);
    }
}
