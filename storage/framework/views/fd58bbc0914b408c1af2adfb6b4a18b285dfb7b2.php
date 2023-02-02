
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">
                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                    <?php if($wishlist): ?>
                        <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="<?php echo e(url('collections/'. $item->product->category->slug.'/'.$item->product->slug)); ?>">
                                        <label class="product-name">
                                            <img src="<?php echo e($item->product->productImages[0]->image); ?>" style="width: 50px; height: 50px" alt="">
                                            <?php echo e($item->product->name); ?>

                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">$<?php echo e($item->product->selling_price); ?> </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                            <input type="text" value="1" class="input-quantity" />
                                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endif; ?>
                          
                </div>
            </div>
        </div>
<?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/livewire/frontend/wishlist-show.blade.php ENDPATH**/ ?>