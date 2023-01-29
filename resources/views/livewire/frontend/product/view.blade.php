<div>
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        @if($product->quantity > 0) 
                            <label class="label-stock  bg-success">In Stock</label>
                            @else
                            <label class="label-stock  bg-success">Out Stock</label>
                            @endif 
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / {{ $product->category->name }} / Product / {{ $product->name }}
                    </p>
                    <div>
                        <span class="selling-price">${{ $product->selling_price }}</span>
                        <span class="original-price">${{ $product->original_price }}</span>
                    </div>
                    <div class="mt-2">
                        @if($product->productColors->count() > 0)
                            @if($product->productColors)
                                @foreach ($product->productColors as $color)
                                    {{-- <input type="radio" name="colorSelection" value {{ $color->id }}> {{ $color->color->name }} --}}
                                    <button class="btn btn-sm py-1 text-white label-stock colorSelectionLabel"  style="background-color: {{ $color->color->code }}" wire:click="selectedColor({{ $color->color->id }})">
                                        {{ $color->color->name }}
                                    </button>
                                @endforeach
                            @endif 

                            @if($this->productColorSelectedQuantity == 'outOfStock')
                                <label for="" class=" btn-sm py-1 text-white label-stock bg-danger">Out Stock</label>

                            @elseif($this->productColorSelectedQuantity > 0)
                                <label for="" class="btn-sm py-1 text-white label-stock bg-success">In Stock</label>
                            @endif
                        @endif
                    </div>
                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                            <input type="text" value="1" class="input-quantity" />
                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {!! $product->small_description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                             {!! $product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
