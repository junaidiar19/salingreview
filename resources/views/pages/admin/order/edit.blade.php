<x-admin-layout>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <x-button.back :url="route('admin.orders.index')" />
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">Edit Order</h4>
                </div>
                <div class="card-body">
                    <x-form :action="route('admin.orders.update', $order)" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.admin.order._form', ['order' => $order])

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
