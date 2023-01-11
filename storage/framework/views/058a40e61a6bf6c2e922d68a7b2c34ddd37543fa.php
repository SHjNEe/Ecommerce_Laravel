<?php $__env->startSection('content'); ?>
 <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.category.index', [])->html();
} elseif ($_instance->childHasBeenRendered('P6nJRfh')) {
    $componentId = $_instance->getRenderedChildComponentId('P6nJRfh');
    $componentTag = $_instance->getRenderedChildComponentTagName('P6nJRfh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('P6nJRfh');
} else {
    $response = \Livewire\Livewire::mount('admin.category.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('P6nJRfh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel-1/resources/views/admin/category/index.blade.php ENDPATH**/ ?>