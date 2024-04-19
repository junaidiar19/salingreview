<x-admin-layout>

    <x-between class="mb-4">
        <h4 class="mb-0">Order</h4>
        <x-button.create :url="route('admin.orders.create')" text="Tambah Order" />
    </x-between>

</x-admin-layout>
