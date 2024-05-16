<!-- Modal Add Unit -->
<div class="modal fade" id="modalAddUnit" tabindex="-1" aria-labelledby="modalAddUnitLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold m-0" id="modalAddUnitLabel">Tambah Satuan</h5>
                <button type="button" class="btn border-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </button>
            </div>
            <div class="modal-body d-flex flex-column gap-3">
                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="unit_code">Kode Satuan</label>
                    <input type="text" class="form-control border-0" id="unit_code" wire:model="unitCode"
                        placeholder="e.g: XXX-XXX-XXX" autocomplete="off">
                </div>

                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="unit_name">Nama Satuan</label>
                    <input type="text" class="form-control border-0" id="unit_name" wire:model="unitName"
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

<!-- Modal Edit Unit -->
@foreach ($units as $item)
    <div class="modal fade" id="modalEditUnit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditUnitLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold m-0" id="modalEditUnitLabel">Edit Satuan</h5>
                    <button type="button" class="btn border-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column gap-3">
                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="unit_code">Kode Satuan</label>
                        <input type="text" class="form-control border-0" id="unit_code" wire:model="unitCode"
                            placeholder="e.g: XXX-XXX-XXX" autocomplete="off">
                    </div>

                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="unit_name">Nama Satuan</label>
                        <input type="text" class="form-control border-0" id="unit_name" name="unit_name"
                            placeholder="e.g: Meja / Kursi / Lemari" wire:model="unitName"
                            value="{{ $item->unit_name }}" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" wire:click="updateData('{{ $item->id }}')" data-bs-dismiss="modal"
                        class="btn btn-sm btn-success text-black fw-bold">Update</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
