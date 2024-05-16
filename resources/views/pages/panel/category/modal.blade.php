<!-- Modal Add Category -->
<div class="modal fade" id="modalAddCategory" tabindex="-1" aria-labelledby="modalAddCategoryLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold m-0" id="modalAddCategoryLabel">Tambah Kategori</h5>
                <button type="button" class="btn border-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </button>
            </div>
            <div class="modal-body d-flex flex-column gap-3">
                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="category_name">Nama Kategori</label>
                    <input type="text" class="form-control border-0" id="category_name" wire:model="categoryName"
                        placeholder="e.g: Meja / Kursi / Lemari" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" wire:click="saveData" data-bs-dismiss="modal"
                    class="btn btn-sm btn-success text-black fw-bold">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Category -->
@foreach ($categories as $category)
    <div class="modal fade" id="modalEditCategory{{ $category->id }}" tabindex="-1"
        aria-labelledby="modalEditCategoryLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold m-0" id="modalEditCategoryLabel">Edit Kategori</h5>
                    <button type="button" class="btn border-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column gap-3">
                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="category_name">Nama Kategori</label>
                        <input type="text" class="form-control border-0" id="category_name" name="category_name"
                            placeholder="e.g: Meja / Kursi / Lemari" wire:model="categoryName"
                            value="{{ $category->category_name }}" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" wire:click="updateData('{{ $category->id }}')" data-bs-dismiss="modal"
                        class="btn btn-sm btn-success text-black fw-bold">Update</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
