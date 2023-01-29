<?php $__env->startSection('title'); ?>
<?php echo e($category->meta_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.product.index', ['category' => $category])->html();
} elseif ($_instance->childHasBeenRendered('mdzM68G')) {
    $componentId = $_instance->getRenderedChildComponentId('mdzM68G');
    $componentTag = $_instance->getRenderedChildComponentTagName('mdzM68G');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mdzM68G');
} else {
    $response = \Livewire\Livewire::mount('frontend.product.index', ['category' => $category]);
    $html = $response->html();
    $_instance->logRenderedChild('mdzM68G', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/frontend/collections/products/index.blade.php ENDPATH**/ ?>