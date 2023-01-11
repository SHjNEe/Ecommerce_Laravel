<div wire:ignore.self class="modal fade" id="addBrandModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="createBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name')
                        <small class="text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" wire:model.defer="slug">
                        @error('slug')
                        <small class="text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" wire:model.defer="status">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
