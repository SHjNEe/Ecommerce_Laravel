<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if(session('status')): ?>
                <h2 class="alert alert-success"><?php echo e(session('status')); ?></h2>
                <?php endif; ?>
                <div class="card-header">
                    <h4>Slider
                        <a href="<?php echo e(url('admin/slider/create')); ?>" class="btn btn-primary btn-sm float-end text-white"
                            href="">Add Slider</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($slider->id); ?></td>
                                <td><?php echo e($slider->title); ?></td>
                                <td><?php echo e($slider->description); ?></td>
                                <td>
                                    <div>
                                        <img src="<?php echo e(asset($slider->image)); ?>" alt="">
                                    </div>
                                </td>
                                <td><?php echo e($slider->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                <td>
                                    <a href="<?php echo e(url('admin/slider/'.$slider->id).'/edit'); ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo e(url('admin/slider/'.$slider->id).'/delete'); ?>" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this slider?')">Delete</a>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/admin/slider/index.blade.php ENDPATH**/ ?>