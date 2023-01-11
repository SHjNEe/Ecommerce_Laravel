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
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm" href="">Edit</a>
                                    <a wire:click="setDeleteId({{ $category->id }})" class="btn btn-danger btn-sm"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" href="">Delete</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure you want to delete this category?</h6>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                  </div>
            </form>
          </div>
        </div>
      </div>
</div>


@push('script')
<script>
    window.addEventListener('close-modal', function(event) {
        $('#deleteModal').modal('hide');
    })
</script>
@endpush