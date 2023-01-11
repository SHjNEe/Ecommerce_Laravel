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
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                <td>
                                    <a href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn btn-primary btn-sm" href="">Edit</a>
                                    <a wire:click="setDeleteId(<?php echo e($category->id); ?>)" class="btn btn-danger btn-sm"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" href="">Delete</a>
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div>
                    <?php echo e($categories->links()); ?>

                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure you want to delete this category?</h6>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                  </div>
            </form>
          </div>
        </div>
      </div>
</div>


<?php $__env->startPush('script'); ?>
<script>
    window.addEventListener('close-modal', function(event) {
        $('#deleteModal').modal('hide');
    })
</script>
<?php $__env->stopPush(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel-1/resources/views/livewire/admin/category/index.blade.php ENDPATH**/ ?>