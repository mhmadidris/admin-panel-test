<!-- Modal Add Brand -->
<div class="modal fade" id="modalAddBrand" tabindex="-1" aria-labelledby="modalAddBrandLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold m-0" id="modalAddBrandLabel">Tambah Merk</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </button>
            </div>
            <div class="modal-body d-flex flex-column gap-3">
                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="brand_name">Nama Merk</label>
                    <input type="text" class="form-control" id="brand_name" wire:model="brandName"
                        placeholder="e.g: Samsung / IKEA / Ace Hardware" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" wire:click="saveData" data-bs-dismiss="modal"
                    class="btn btn-sm btn-success text-black fw-bold">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Brand -->
@foreach ($brands as $brand)
    <div class="modal fade" id="modalEditBrand{{ $brand->id }}" tabindex="-1" aria-labelledby="modalEditBrandLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold m-0" id="modalEditBrandLabel">Edit Merk</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column gap-3">
                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="brand_name">Nama Merk</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name"
                            placeholder="e.g: Samsung / IKEA / Ace Hardware" wire:model="brandName"
                            value="{{ $brand->brand_name }}" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" wire:click="updateData('{{ $brand->id }}')" data-bs-dismiss="modal"
                        class="btn btn-sm btn-success text-black fw-bold">Update</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
