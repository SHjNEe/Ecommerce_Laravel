<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if(session('status')): ?>
                <h2 class="alert alert-success"><?php echo e(session('status')); ?></h2>
                <?php endif; ?>
                <div class="card-header">
                    <h4>Category
                        <a  href="<?php echo e(url('admin/category/create')); ?>" class="btn btn-primary btn-sm float-end"href="">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/admin/category/index.blade.php ENDPATH**/ ?>