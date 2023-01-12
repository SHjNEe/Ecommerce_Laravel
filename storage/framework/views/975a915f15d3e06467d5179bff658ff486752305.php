

<?php $__env->startSection('content'); ?>
 <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.category.index', [])->html();
} elseif ($_instance->childHasBeenRendered('76G95vz')) {
    $componentId = $_instance->getRenderedChildComponentId('76G95vz');
    $componentTag = $_instance->getRenderedChildComponentTagName('76G95vz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('76G95vz');
} else {
    $response = \Livewire\Livewire::mount('admin.category.index', []);
    $html = $response->html();
    $_instance->logRenderedChild('76G95vz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/Workspaces/Ecommerce_Laravel/resources/views/admin/category/index.blade.php ENDPATH**/ ?>