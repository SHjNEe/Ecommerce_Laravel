<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a  href="<?php echo e(url('admin/category')); ?>" class="btn btn-primary btn-sm float-end"href="">Back</a>
                </h4>
            </div>
            <div class="card-body">
                    <form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                       <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($category->name); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <small class="text-danger"> <?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value="<?php echo e($category->slug); ?>">
                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <small class="text-danger"> <?php echo e($message); ?></small>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea type="text" class="form-control" rows="10" name="description"><?php echo e($category->description); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <small class="text-danger"> <?php echo e($message); ?></small>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src="<?php echo e(asset('uploads/category/'.$category->image)); ?>" alt="">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" <?php echo e($category->status == '1' ? 'checked' : ''); ?>>
                            </div>

                            <div class="mb-3 col-md-12">
                                <h4>SEO Tag</h4>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="<?php echo e($category->meta_title); ?>">
                                <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <small class="text-danger"> <?php echo e($message); ?></small>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" class="form-control" name="meta_keyword"><?php echo e($category->meta_keyword); ?></textarea>
                                <?php $__errorArgs = ['meta_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <small class="text-danger"> <?php echo e($message); ?></small>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Description</label>
                                <textarea type="text" class="form-control" name="meta_description"><?php echo e($category->meta_description); ?></textarea>
                                <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                               <small class="text-danger"> <?php echo e($message); ?></small>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-md-6">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                       </div>
                        
                    </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>