<?php $__env->startSection('content'); ?>
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
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category</td>
                                <td>Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>                             
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->id); ?></td>
                                <td>
                                    <?php if($product->category): ?>
                                    <?php echo e($product->category->name); ?>

                                    <?php else: ?>
                                        No Category
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->selling_price); ?></td>
                                <td><?php echo e($product->quantity); ?></td>
                                <td><?php echo e($product->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                <td>
                                    <a href="<?php echo e(url('admin/product/'.$product->id.'/edit')); ?>" class=" btn-sm btn btn-primary text-white">Edit</a>
                                    <a href="<?php echo e(url('admin/product/'.$product->id.'/delete')); ?>" onclick="confirm('Are you sure you want to delete this product?')" class=" btn-sm btn btn-danger text-white">Delete</a>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/Workspaces/Ecommerce_Laravel/resources/views/admin/products/index.blade.php ENDPATH**/ ?>