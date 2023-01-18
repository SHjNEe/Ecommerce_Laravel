<div class="row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
        <div class="product-card">
            <div class="product-card-img">
                <?php if($product->quantity > 0): ?> 
                <label class="stock bg-success">In Stock</label>
                <?php else: ?>
                <label class="stock bg-success">Out Stock</label>
                <?php endif; ?> 
                <?php if($product->productImages->count() > 0): ?> 
                <img src="<?php echo e(asset($product->productImages[0]->image)); ?>" alt="Laptop">
                <?php endif; ?>
            </div>
            <div class="product-card-body">
                <p class="product-brand"><?php echo e($product->brand); ?></p>
                <h5 class="product-name">
                   <a href="<?php echo e(url('/collections/'.$product->category->slug.'/'.$product->slug)); ?>">
                        <?php echo e($product->name); ?>

                   </a>
                </h5>
                <div>
                    <span class="selling-price">$<?php echo e($product->selling_price); ?></span>
                    <span class="original-price">$<?php echo e($product->original_price); ?></span>
                </div>
          
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/livewire/frontend/product/index.blade.php ENDPATH**/ ?>