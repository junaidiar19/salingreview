<x-admin-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mb-3">
                <x-button.back :url="route('admin.users.index')" />
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">Edit Pengguna</h4>
                </div>
                <div class="card-body">
                    <x-form :action="route('admin.users.update', $user->id)">
                        @method('PUT')
                        @include('pages.admin.user._form', ['user' => $user])

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
