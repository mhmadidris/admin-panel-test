<div>
    <x-loading />

    <div class="mb-4 d-flex justify-content-between align-content-center align-items-center">
        <div>
            <h5 class="fw-bold text-white m-0">
                Daftar Katalog
            </h5>
            <p class="m-0 text-white">Total {{ count($catalogs) }} Katalog</p>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#modalAddCategory"
            class="btn btn-sm text-black bg-light d-flex flex-row align-items-center justify-content-center gap-2 mb-2 fw-bold">
            <i class="fas fa-plus"></i>
            <span class="d-md-block d-none">Tambah</span>
        </button>
    </div>

    @if ($catalogs->isNotEmpty())
        <table class="table table-borderless table-responsive">
            <thead>
                <tr class="text-center">
                    <th class="text-center text-black" scope="col">#</th>
                    <th class="text-black" scope="col">Nama Katalog</th>
                    <th class="text-black" scope="col">Merk</th>
                    <th class="text-black" scope="col">Kategori</th>
                    <th class="text-black" scope="col">Satuan</th>
                    <th class="text-black" scope="col">Status</th>
                    <th class="text-center text-black" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($catalogs as $catalog)
                    <tr class="text-center">
                        <th class="text-center text-black" scope="row">{{ $i++ }}</th>
                        <td class="text-black">{{ $catalog->catalog_name }}</td>
                        <td class="text-black">{{ $catalog->brand_name }}</td>
                        <td class="text-black">{{ $catalog->category_name }}</td>
                        <td class="text-black">{{ $catalog->unit_code . ' - ' . $catalog->unit_name }}</td>
                        <td class="text-black">{{ $catalog->catalog_status }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-content-center align-items-center">
                                <button class="btn border-0" style="color: #FF4040;" data-bs-toggle="modal"
                                    wire:click="editData('{{ $catalog->id }}')"
                                    data-bs-target="#modalEditCategory{{ $catalog->id }}">Edit</button>

                                <button class="btn border-0" wire:click="deleteData('{{ $catalog->id }}')"
                                    style="color: #FF4040;" type="submit">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="d-flex justify-content-center align-items-center w-100 text-white">
            <div class="d-flex flex-column align-items-center">
                <img class="" src="{{ asset('images/empty.png') }}" alt="No Found"
                    style="width: 15rem; height: 15rem;">
                <h4 class="fw-bold">MAAF!</h4>
                <p>Tidak ada data di database kami</p>
            </div>
        </div>
    @endif

    @include('pages.panel.catalog.modal')
</div>
