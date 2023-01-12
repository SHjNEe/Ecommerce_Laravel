@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <div class="card-header">
                    <h4>Products
                        <a href="{{ url('admin/product/create') }}" class="btn btn-primary btn-sm float-end text-white"
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
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->category)
                                    {{ $product->category->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/product/'.$product->id.'/edit') }}" class=" btn-sm btn btn-primary text-white">Edit</a>
                                    <a href="{{ url('admin/product/'.$product->id.'/delete') }}" onclick="confirm('Are you sure you want to delete this product?')" class=" btn-sm btn btn-danger text-white">Delete</a>

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

