@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <div class="card-header">
                    <h4>Colors
                        <a href="{{ url('admin/color/create') }}" class="btn btn-primary btn-sm float-end text-white"
                            href="">Add Color</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-sptriped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Code</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/color/'.$color->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url('admin/color/'.$color->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data ?')" class="btn btn-danger btn-sm">Delete</a>
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


