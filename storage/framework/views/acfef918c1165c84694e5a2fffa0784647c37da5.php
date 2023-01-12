<div class="row">
    <div class="col-md-12">
        <div class="card">
             <?php if(session('status')): ?>
            <h2 class="alert alert-success"><?php echo e(session('status')); ?></h2>
            <?php endif; ?>
            <div class="card-header">
                <h4>Products
                    <a href="<?php echo e(url('admin/product/create')); ?>" class="btn btn-primary btn-sm float-end text-white"
                        href="">Add Products</a>
                </h4>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('script'); ?>
<script>
    window.addEventListener('close-modal', function (event) {
        $('#deleteModal').modal('hide');
    })

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/ubuntu/Workspaces/Ecommerce_Laravel/resources/views/livewire/admin/product/index.blade.php ENDPATH**/ ?>