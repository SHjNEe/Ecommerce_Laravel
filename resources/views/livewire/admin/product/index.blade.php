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

            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    window.addEventListener('close-modal', function (event) {
        $('#deleteModal').modal('hide');
    })

</script>
@endpush
