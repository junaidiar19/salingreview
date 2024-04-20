<x-admin-layout>

    <x-between class="mb-4">
        <h4 class="mb-0">Order</h4>
        <x-button.create :url="route('admin.orders.create')" text="Tambah Order" />
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
                            <th>Produk</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $orders->firstItem() + $key }}</td>
                                <td>{{ $order->code }}</td>
                                <td>
                                    <ul class="mb-0">
                                        @foreach ($order->details as $detail)
                                            <li>
                                                {{ $detail->product_name }} 
                                                <br>
                                                <small>Jumlah : {{ $detail->quantity }} | Harga: {{ rupiahFormat($detail->price) }}</small>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ rupiahFormat($order->total) }}</td>
                                <td>
                                    <x-badge.order-status :status="$order->status">
                                        {{ $order->status_label }}
                                    </x-badge.order-status>
                                </td>
                                <td>
                                    <x-button.edit :url="route('admin.orders.edit', $order)" text="Edit" />
                                    <x-button.delete :url="route('admin.orders.destroy', $order)" text="Hapus" itemName="{{ $order->name }}" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">-tidak ada data-</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <x-pagination :data="$orders" />
            </div>
        </div>
    </div>

</x-admin-layout>
