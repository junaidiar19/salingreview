<x-admin-layout>
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="mb-3">
                <x-button.back :url="route('admin.orders.index')" />
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">Tambah Order</h4>
                </div>
                <div class="card-body">
                    <x-form :action="route('admin.orders.store')" enctype="multipart/form-data">
                        @include('pages.admin.order._form')

                        <div class="d-grid">
                            <x-button.submit>
                                Simpan
                            </x-button.submit>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
