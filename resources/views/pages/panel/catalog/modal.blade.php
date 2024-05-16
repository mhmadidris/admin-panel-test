<!-- Modal Add Katalog -->
<div class="modal fade" id="modalAddCategory" tabindex="-1" aria-labelledby="modalAddCategoryLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold m-0" id="modalAddCategoryLabel">Tambah Katalog</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </button>
            </div>
            <div class="modal-body d-flex flex-column gap-3">
                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="catalog_name">Nama Katalog</label>
                    <input type="text" class="form-control" id="catalog_name" wire:model="catalogName"
                        placeholder="e.g: Catalog 1" autocomplete="off">
                </div>

                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="brand_select">Merk</label>
                    <select wire:model="catalogBrand" id="brand_select" class="form-select"
                        aria-label=".form-select-lg example">
                        <option value="" selected disabled>-- Pilih Merk --</option>
                        @forelse ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @empty
                            <h6 class="m-0 fst-italic">No data found</h6>
                        @endforelse
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="category_select">Kategori</label>
                        <select wire:model="catalogCategory" id="category_select" class="form-select"
                            aria-label=".form-select-lg example">
                            <option value="" selected disabled>-- Pilih Kategori --</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @empty
                                <h6 class="m-0 fst-italic">No data found</h6>
                            @endforelse
                        </select>
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="unit_select">Satuan</label>
                        <select wire:model="catalogUnit" id="unit_select" class="form-select"
                            aria-label=".form-select-lg example">
                            <option value="" selected disabled>-- Pilih Satuan --</option>
                            @forelse ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_code . ' - ' . $unit->unit_name }}
                                </option>
                            @empty
                                <h6 class="m-0 fst-italic">No data found</h6>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-column w-100">
                    <label class="pb-1 h6 fw-bold" for="status_select">Status</label>
                    <select wire:model="catalogStatus" id="status_select" class="form-select"
                        aria-label=".form-select-lg example">
                        <option value="" selected disabled>-- Pilih Status --</option>
                        <option value="Bagus">Bagus</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                        <option value="Dalam Perbaikan">Dalam Perbaikan</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="submit" wire:click="saveData" data-bs-dismiss="modal"
                    class="btn btn-sm btn-success text-black fw-bold">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Katalog -->
@foreach ($catalogs as $catalog)
    <div class="modal fade" id="modalEditCategory{{ $catalog->id }}" tabindex="-1"
        aria-labelledby="modalEditCategoryLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold m-0" id="modalEditCategoryLabel">Edit Katalog</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column gap-3">
                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="catalog_name">Nama Katalog</label>
                        <input type="text" class="form-control" id="catalog_name" wire:model="catalogName"
                            placeholder="e.g: Catalog 1" autocomplete="off">
                    </div>

                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="brand_select">Merk</label>
                        <select wire:model="catalogBrand" id="brand_select" class="form-select"
                            aria-label=".form-select-lg example">
                            <option value="" selected disabled>-- Pilih Merk --</option>
                            @forelse ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @empty
                                <h6 class="m-0 fst-italic">No data found</h6>
                            @endforelse
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <div class="d-flex flex-column w-100">
                            <label class="pb-1 h6 fw-bold" for="category_select">Kategori</label>
                            <select wire:model="catalogCategory" id="category_select" class="form-select"
                                aria-label=".form-select-lg example">
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @empty
                                    <h6 class="m-0 fst-italic">No data found</h6>
                                @endforelse
                            </select>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <label class="pb-1 h6 fw-bold" for="unit_select">Satuan</label>
                            <select wire:model="catalogUnit" id="unit_select" class="form-select"
                                aria-label=".form-select-lg example">
                                <option value="" selected disabled>-- Pilih Satuan --</option>
                                @forelse ($units as $unit)
                                    <option value="{{ $unit->id }}">
                                        {{ $unit->unit_code . ' - ' . $unit->unit_name }}
                                    </option>
                                @empty
                                    <h6 class="m-0 fst-italic">No data found</h6>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column w-100">
                        <label class="pb-1 h6 fw-bold" for="status_select">Status</label>
                        <select wire:model="catalogStatus" id="status_select" class="form-select"
                            aria-label=".form-select-lg example">
                            <option value="" selected disabled>-- Pilih Status --</option>
                            <option value="Bagus">Bagus</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                            <option value="Dalam Perbaikan">Dalam Perbaikan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" wire:click="updateData('{{ $catalog->id }}')" data-bs-dismiss="modal"
                        class="btn btn-sm btn-success text-black fw-bold">Update</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
