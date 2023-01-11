@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a  href="{{ url('admin/category') }}" class="btn btn-primary btn-sm float-end"href="">Back</a>
                </h4>
            </div>
            <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                @error('name')
                                   <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                                @error('slug')
                               <small class="text-danger"> {{ $message }}</small>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea type="text" class="form-control" rows="10" name="description">{{ $category->description }}</textarea>
                                @error('description')
                               <small class="text-danger"> {{ $message }}</small>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset('uploads/category/'.$category->image) }}" alt="">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                            </div>

                            <div class="mb-3 col-md-12">
                                <h4>SEO Tag</h4>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}">
                                @error('meta_title')
                               <small class="text-danger"> {{ $message }}</small>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" class="form-control" name="meta_keyword">{{ $category->meta_keyword }}</textarea>
                                @error('meta_keyword')
                               <small class="text-danger"> {{ $message }}</small>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Meta Description</label>
                                <textarea type="text" class="form-control" name="meta_description">{{ $category->meta_description }}</textarea>
                                @error('meta_description')
                               <small class="text-danger"> {{ $message }}</small>
                                 @enderror
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

@endsection