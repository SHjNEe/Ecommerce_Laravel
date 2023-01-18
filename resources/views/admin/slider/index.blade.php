@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <div class="card-header">
                    <h4>Slider
                        <a href="{{ url('admin/slider/create') }}" class="btn btn-primary btn-sm float-end text-white"
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
                            @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <div>
                                        <img src="{{ asset($slider->image) }}" alt="">
                                    </div>
                                </td>
                                <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/slider/'.$slider->id).'/edit' }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ url('admin/slider/'.$slider->id).'/delete' }}" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this slider?')">Delete</a>
                                </td>
                            </tr>                            
                                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

