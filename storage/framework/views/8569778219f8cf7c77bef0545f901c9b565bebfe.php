<?php $__env->startSection('title'); ?>
<?php echo e($product->meta_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.product.view', ['product' => $product,'category' => $category])->html();
} elseif ($_instance->childHasBeenRendered('FWV4lgJ')) {
    $componentId = $_instance->getRenderedChildComponentId('FWV4lgJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('FWV4lgJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FWV4lgJ');
} else {
    $response = \Livewire\Livewire::mount('frontend.product.view', ['product' => $product,'category' => $category]);
    $html = $response->html();
    $_instance->logRenderedChild('FWV4lgJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/frontend/collections/products/view.blade.php ENDPATH**/ ?>