<div>
    <x-loading />

    <div class="mb-4 d-flex justify-content-between align-content-center align-items-center">
        <div>
            <h5 class="fw-bold text-white m-0">
                Daftar Merk
            </h5>
            <p class="m-0 text-white">Total {{ count($brands) }} Merk</p>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#modalAddBrand"
            class="btn btn-sm text-black bg-light d-flex flex-row align-items-center justify-content-center gap-2 mb-2 fw-bold">
            <i class="fas fa-plus"></i>
            <span class="d-md-block d-none">Tambah</span>
        </button>
    </div>

    @if ($brands->isNotEmpty())
        <table class="table table-borderless table-responsive">
            <thead>
                <tr class="text-center">
                    <th class="text-center text-black" scope="col">#</th>
                    <th class="text-black" scope="col">Nama Merk</th>
                    <th class="text-center text-black" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($brands as $brand)
                    <tr class="text-center">
                        <th class="text-center text-black" scope="row">{{ $i++ }}</th>
                        <td class="text-black">{{ $brand->brand_name }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-content-center align-items-center">
                                <button class="btn border-0" style="color: #FF4040;" data-bs-toggle="modal"
                                    wire:click="editData('{{ $brand->id }}')"
                                    data-bs-target="#modalEditBrand{{ $brand->id }}">Edit</button>

                                <button class="btn border-0" wire:click="deleteData('{{ $brand->id }}')"
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

    @include('pages.panel.brand.modal')
</div>
