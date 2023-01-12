<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Product
                    <a href="<?php echo e(url('admin/product')); ?>" class="btn btn-primary btn-sm text-white float-end"
                        href="">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-warning">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><?php echo e($error); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                <?php endif; ?>

                <?php if(session('status')): ?>
                <h2 class="alert alert-success"><?php echo e(session('status')); ?></h2>
                <?php endif; ?>
                <form action="<?php echo e(url('admin/product/'.$product->id.'/edit')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tags-tab" data-bs-toggle="tab"
                                data-bs-target="#seo-tags-tab-pane" type="button" role="tab"
                                aria-controls="seo-tags-tab-pane" aria-selected="false">SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#image-tab-pane" type="button" role="tab"
                                aria-controls="image-tab-pane" aria-selected="false">Image</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">

                            <div class="mb-3 mt-3">
                                <label for="">Category</label>
                                <select class="form-control" name="category_id" id="">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <option value=" <?php echo e($category->id); ?>" <?php echo e($category->id == $product->categor_id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="">Brand</label>
                                <select class="form-control" name="brand" id="">
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=" <?php echo e($brand->name); ?>" <?php echo e($brand->name == $product->brand ? 'selected' : ""); ?>>
                                        <?php echo e($brand->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input type="text" name="slug" class="form-control" value="<?php echo e($product->slug); ?>">
                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Small Description</label>
                                <input type="text" name="small_description" class="form-control" value="<?php echo e($product->small_description); ?>">
                                <?php $__errorArgs = ['small_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Product Description</label>
                                <textarea  type="text" name="description" class="form-control" rows="10"><?php echo e($product->description); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>







                        </div>
                        <div class="tab-pane fade" id="seo-tags-tab-pane" role="tabpanel" aria-labelledby="seo-tags-tab"
                            tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="<?php echo e($product->meta_title); ?>">
                                <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control" value="<?php echo e($product->meta_keyword); ?>">
                                <?php $__errorArgs = ['meta_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control"><?php echo e($product->meta_description); ?></textarea>
                                <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Original Price</label>
                                <input type="text" name="original_price" class="form-control" value="<?php echo e($product->original_price); ?>">
                                <?php $__errorArgs = ['original_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Selling Price</label>
                                <input type="text" name="selling_price" class="form-control" value="<?php echo e($product->selling_price); ?>">
                                <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="<?php echo e($product->quantity); ?>">
                                <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="">Trending</label><br>
                                <input type="checkbox" name="trending"
                                <?php echo e($product->trending == 1 ? 'checked' : ''); ?>

                                    style="width: 20px; height: 20px" />
                            </div>

                            <div class="mb-3">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status"                                     <?php echo e($product->status == 1 ? 'checked' : ''); ?>

                                <?php echo e($product->status == 1 ? 'checked' : ''); ?>

                                    style="width: 20px; height: 20px" />

                            </div>
                        </div>
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                <?php if($product->productImages): ?>
                                <div class="row">

                                <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2">
                                        <img class="me-5 border" src="<?php echo e(asset($image->image)); ?>" alt="" style="width: 100px; height: 100px;">
                                        <a href="<?php echo e(url('admin/product-image/'.$image->id.'/delete')); ?>" class="d-block">Remove</a>
                                    </div>
                               
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <?php else: ?>
                                <h4>No Image Added</h4>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/trungs_macos/Desktop/Workspace/Ecommerce_Laravel/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>