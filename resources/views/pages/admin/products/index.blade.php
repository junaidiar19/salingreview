<x-admin-layout>

    <x-between class="mb-4">
        <h4 class="mb-0">Master Produk</h4>
        <x-button.create :url="route('admin.products.create')" text="Tambah Produk" />
    </x-between>

    <div class="card">
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                        <x-filter.rows />
                    </div>
                    <div class="col-12 col-sm-4 col-lg-3 ms-auto">
                        <x-filter.search />
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-rounded whitespace-nowrap">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ rupiahFormat($product->price) }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <x-button.edit :url="route('admin.products.edit', $product)" text="Edit" />
                                    <x-button.delete :url="route('admin.products.destroy', $product)" text="Hapus" itemName="{{ $product->name }}" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">-tidak ada data-</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <x-pagination :data="$products" />
            </div>
        </div>
    </div>
</x-admin-layout>
