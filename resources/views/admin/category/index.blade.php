@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <div class="card-header">
                    <h4>Category
                        <a  href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end"href="">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection