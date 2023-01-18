@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Slider
                    <a href="{{ url('admin/slider') }}" class="btn btn-primary btn-sm text-white float-end"
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
                <form action="{{ url('admin/slider/'.$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description">{{ $slider->description }}</textarea>
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input class="form-control" name="image" type="file"/>
                        <img src="{{ asset($slider->image) }}" alt="">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" >Status</label><br>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }}>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary text-white">Update Slider</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

@endsection
