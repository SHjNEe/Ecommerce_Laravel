<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if(session('status')): ?>
                <h2 class="alert alert-success"><?php echo e(session('status')); ?></h2>
                <?php endif; ?>
                <div class="card-header">
                    <h4>Colors
                        <a href="<?php echo e(url('admin/color/create')); ?>" class="btn btn-primary btn-sm float-end text-white"
                            href="">Add Color</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-sptriped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Code</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($color->id); ?></td>
                                    <td><?php echo e($color->name); ?></td>
                                    <td><?php echo e($color->code); ?></td>
                                    <td><?php echo e($color->status == 1 ? 'Hidden' : 'Visible'); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('admin/color/'.$color->id.'/edit')); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo e(url('admin/color/'.$color->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this data ?')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/Workspaces/Ecommerce_Laravel/resources/views/admin/colors/index.blade.php ENDPATH**/ ?>