<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Total</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                 
                            <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($item->product): ?>
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="<?php echo e(url('collections/'.$item->product->category->slug)); ?>">
                                            <label class="product-name">
                                                <img src="<?php echo e(asset($item->product->productImages[0]->image)); ?>" style="width: 50px; height: 50px" alt="">
                                                <?php echo e($item->product->name); ?>

                                                <?php if($item->productColors): ?>
                                                <span>-Color: <?php echo e($item->productColors->color->name); ?></span>
                                                <?php endif; ?>
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">$<?php echo e($item->product->selling_price); ?> </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <button wire:click="decrementQuantity(<?php echo e($item->id); ?>)" wire:loading.attr="disabled" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="<?php echo e($item->quantity); ?>" class="input-quantity" />
                                                <button wire:click="incrementQuantity(<?php echo e($item->id); ?>)" wire:loading.attr="disabled" class="btn btn1"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">$<?php echo e($item->product->selling_price * $item->quantity); ?></label>
                                        <?php
                                            $totalPrice += $item->product->selling_price * $item->quantity
                                        ?>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button class="btn btn-danger btn-sm" wire:click="removeCartItem(<?php echo e($item->id); ?>)">
                                                <span wire:loading.remove>
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeWishListItem">
                                                    <i class="fa fa-trash"></i> Removing...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h1>No cart items available</h1>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-8 my-md-auto mt-3">
                                    <h4>Get the best deal $ offer ! <a href="<?php echo e(url('collections')); ?>">Shop now</a></h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="shadow-sm bg-white p-3">
                                        <h4>Total:
                                            <span><?php echo e($totalPrice ?? 0); ?></span>
                                        </h4>
                                        <a href="<?php echo e(url('checkout')); ?>" class="btn btn-warning w-100">Checkout</a>
                                    </div>
                                </div>
                            </div>
                                              
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/livewire/frontend/cart/cart-show.blade.php ENDPATH**/ ?>