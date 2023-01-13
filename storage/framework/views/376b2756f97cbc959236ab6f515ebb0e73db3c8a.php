<?php $__env->startSection('content'); ?>
 <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.category.index', [])->html();
} elseif ($_instance->childHasBeenRendered('KWSHYD8')) {
    $componentId = $_instance->getRenderedChildComponentId('KWSHYD8');
    $componentTag = $_instance->getRenderedChildComponentTagName('KWSHYD8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KWSHYD8');
} else {
    $response = \Livewire\Livewire::mount('admin.category.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('KWSHYD8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/admin/category/index.blade.php ENDPATH**/ ?>