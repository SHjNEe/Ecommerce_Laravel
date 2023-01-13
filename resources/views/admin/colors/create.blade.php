@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <div class="card-header">
                    <h4>Add Color
                        <a href="{{ url('admin/color') }}" class="btn btn-primary btn-sm float-end text-white"
                            href="">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/color') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Color Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <small class="text-danger"> {{ $message }}</small>
                             @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Color Code</label>
                            <input type="text" name="code" class="form-control">
                            @error('code')
                            <small class="text-danger"> {{ $message }}</small>
                             @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Color Status</label><br>
                            <input type="checkbox" name="status" style="width: 50px; height: 50px;">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Create</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


