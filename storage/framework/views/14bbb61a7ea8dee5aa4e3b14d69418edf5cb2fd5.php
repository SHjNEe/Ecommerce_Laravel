<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.cart.cart-show', [])->html();
} elseif ($_instance->childHasBeenRendered('tViYJV4')) {
    $componentId = $_instance->getRenderedChildComponentId('tViYJV4');
    $componentTag = $_instance->getRenderedChildComponentTagName('tViYJV4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tViYJV4');
} else {
    $response = \Livewire\Livewire::mount('frontend.cart.cart-show', []);
    $html = $response->html();
    $_instance->logRenderedChild('tViYJV4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/frontend/cart/index.blade.php ENDPATH**/ ?>