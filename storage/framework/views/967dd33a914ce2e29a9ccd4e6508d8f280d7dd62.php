<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.wishlist-show', [])->html();
} elseif ($_instance->childHasBeenRendered('C6yQc9x')) {
    $componentId = $_instance->getRenderedChildComponentId('C6yQc9x');
    $componentTag = $_instance->getRenderedChildComponentTagName('C6yQc9x');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('C6yQc9x');
} else {
    $response = \Livewire\Livewire::mount('frontend.wishlist-show', []);
    $html = $response->html();
    $_instance->logRenderedChild('C6yQc9x', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/frontend/wishlist/index.blade.php ENDPATH**/ ?>