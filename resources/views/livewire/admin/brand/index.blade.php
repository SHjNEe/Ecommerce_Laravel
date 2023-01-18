
<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <h2 class="alert alert-success">{{ session('status') }}</h2>
                @endif
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="" class="btn btn-primary float-end" data-bs-toggle='modal' data-bs-target="#addBrandModal">Add Brand</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">


                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Slug</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->categories->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="" data-bs-toggle='modal' data-bs-target="#updateBrandModal" wire:click="editBrand({{ $brand->id }})">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="" data-bs-toggle='modal' data-bs-target="#deleteBrandModal" wire:click="deleteBrand({{ $brand->id }})">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>

                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    window.addEventListener('close-modal', function(event) {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    })
</script>
@endpush
