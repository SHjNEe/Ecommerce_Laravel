@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Product
                    <a href="{{ url('admin/product') }}" class="btn btn-primary btn-sm text-white float-end"
                        href="">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error )
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>

                @endif

                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <form action="{{ url('admin/product/'.$product->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                    @foreach ($categories as $category )
                                
                                    <option value=" {{ $category->id }}" {{ $category->id == $product->categor_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="">Brand</label>
                                <select class="form-control" name="brand" id="">
                                    @foreach ($brands as $brand )
                                    <option value=" {{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : "" }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                                @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Small Description</label>
                                <input type="text" name="small_description" class="form-control" value="{{ $product->small_description }}">
                                @error('small_description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Product Description</label>
                                <textarea  type="text" name="description" class="form-control" rows="10">{{ $product->description }}</textarea>
                                @error('description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>







                        </div>
                        <div class="tab-pane fade" id="seo-tags-tab-pane" role="tabpanel" aria-labelledby="seo-tags-tab"
                            tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                                @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control" value="{{ $product->meta_keyword }}">
                                @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
                                @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Original Price</label>
                                <input type="text" name="original_price" class="form-control" value="{{ $product->original_price }}">
                                @error('original_price')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Selling Price</label>
                                <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                                @error('selling_price')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
                                @error('selling_price')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Trending</label><br>
                                <input type="checkbox" name="trending"
                                {{ $product->trending == 1 ? 'checked' : '' }}
                                    style="width: 20px; height: 20px" />
                            </div>

                            <div class="mb-3">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status"                                     {{ $product->status == 1 ? 'checked' : '' }}
                                {{ $product->status == 1 ? 'checked' : '' }}
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
                                @if($product->productImages)
                                <div class="row">

                                @foreach($product->productImages as $image)
                                    <div class="col-md-2">
                                        <img class="me-5 border" src="{{ asset($image->image) }}" alt="" style="width: 100px; height: 100px;">
                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                    </div>
                               
                                @endforeach
                                </div>

                                @else
                                <h4>No Image Added</h4>
                                @endif
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

@endsection