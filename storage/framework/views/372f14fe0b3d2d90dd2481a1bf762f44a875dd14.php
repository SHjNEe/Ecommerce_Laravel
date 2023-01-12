<?php $__env->startSection('content'); ?>
 <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.product.index', [])->html();
} elseif ($_instance->childHasBeenRendered('LQx7HHd')) {
    $componentId = $_instance->getRenderedChildComponentId('LQx7HHd');
    $componentTag = $_instance->getRenderedChildComponentTagName('LQx7HHd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LQx7HHd');
} else {
    $response = \Livewire\Livewire::mount('admin.product.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('LQx7HHd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/Workspaces/Ecommerce_Laravel/resources/views/admin/products/index.blade.php ENDPATH**/ ?>