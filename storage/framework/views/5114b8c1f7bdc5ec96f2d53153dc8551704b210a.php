<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
<div class="py-3 py-md-4 checkout">
    <div class="container">
        <h4>Checkout</h4>
        <hr>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.checkout.checkout-show', [])->html();
} elseif ($_instance->childHasBeenRendered('D9SptG3')) {
    $componentId = $_instance->getRenderedChildComponentId('D9SptG3');
    $componentTag = $_instance->getRenderedChildComponentTagName('D9SptG3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('D9SptG3');
} else {
    $response = \Livewire\Livewire::mount('frontend.checkout.checkout-show', []);
    $html = $response->html();
    $_instance->logRenderedChild('D9SptG3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      
    </div>
</div>

<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/frontend/checkout/index.blade.php ENDPATH**/ ?>