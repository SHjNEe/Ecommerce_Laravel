
<div>
    <?php echo $__env->make('livewire.admin.brand.modal-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if(session('status')): ?>
                <h2 class="alert alert-success"><?php echo e(session('status')); ?></h2>
                <?php endif; ?>
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="" class="btn btn-primary float-end" data-bs-toggle='modal' data-bs-target="#addBrandModal">Add Brand</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">


                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($brand->id); ?></td>
                                    <td><?php echo e($brand->name); ?></td>
                                    <td><?php echo e($brand->slug); ?></td>
                                    <td><?php echo e($brand->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="" data-bs-toggle='modal' data-bs-target="#updateBrandModal" wire:click="editBrand(<?php echo e($brand->id); ?>)">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="" data-bs-toggle='modal' data-bs-target="#deleteBrandModal" wire:click="deleteBrand(<?php echo e($brand->id); ?>)">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>

                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div>
                        <?php echo e($brands->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('script'); ?>
<script>
    window.addEventListener('close-modal', function(event) {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/livewire/admin/brand/index.blade.php ENDPATH**/ ?>