<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.wishlist-show', [])->html();
} elseif ($_instance->childHasBeenRendered('fqNalQy')) {
    $componentId = $_instance->getRenderedChildComponentId('fqNalQy');
    $componentTag = $_instance->getRenderedChildComponentTagName('fqNalQy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fqNalQy');
} else {
    $response = \Livewire\Livewire::mount('frontend.wishlist-show', []);
    $html = $response->html();
    $_instance->logRenderedChild('fqNalQy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/frontend/wishlist/index.blade.php ENDPATH**/ ?>