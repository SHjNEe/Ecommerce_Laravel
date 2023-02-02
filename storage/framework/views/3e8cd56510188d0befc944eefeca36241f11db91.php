<div>
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <?php if(session()->has('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>


            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    <img src="<?php echo e(asset($product->productImages[0]->image)); ?>" class="w-100" alt="Img">
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        <?php echo e($product->name); ?>

                        <?php if($product->quantity > 0): ?> 
                            <label class="label-stock  bg-success">In Stock</label>
                            <?php else: ?>
                            <label class="label-stock  bg-success">Out Stock</label>
                            <?php endif; ?> 
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / <?php echo e($product->category->name); ?> / Product / <?php echo e($product->name); ?>

                    </p>
                    <div>
                        <span class="selling-price">$<?php echo e($product->selling_price); ?></span>
                        <span class="original-price">$<?php echo e($product->original_price); ?></span>
                    </div>
                    <div class="mt-2">
                        <?php if($product->productColors->count() > 0): ?>
                            <?php if($product->productColors): ?>
                                <?php $__currentLoopData = $product->productColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <button class="btn btn-sm py-1 text-white label-stock colorSelectionLabel"  style="background-color: <?php echo e($color->color->code); ?>" wire:click="selectedColor(<?php echo e($color->color->id); ?>)">
                                        <?php echo e($color->color->name); ?>

                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> 

                            <?php if($this->productColorSelectedQuantity == 'outOfStock'): ?>
                                <label for="" class=" btn-sm py-1 text-white label-stock bg-danger">Out Stock</label>

                            <?php elseif($this->productColorSelectedQuantity > 0): ?>
                                <label for="" class="btn-sm py-1 text-white label-stock bg-success">In Stock</label>
                            <?php endif; ?>
                        <?php endif; ?>
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
                        <button type="button" wire:click="addToWishlist(<?php echo e($product->id); ?>)" href="" class="btn btn1"> 
                            <span wire:loading.remove>
                                <i class="fa fa-heart"></i> Add To Wishlist 
                            </span>
                            <span wire:loading wire:target="addToWishlist">
                                Adding...
                            </span>
                        </button>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            <?php echo $product->small_description; ?>

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
                             <?php echo $product->description; ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/livewire/frontend/product/view.blade.php ENDPATH**/ ?>