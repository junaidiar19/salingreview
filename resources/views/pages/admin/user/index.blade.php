<x-admin-layout>

    <x-between class="mb-4">
        <h4 class="mb-0">Daftar Pengguna</h4>
        <x-button.create :url="route('admin.users.create')" text="Tambah Pengguna" />
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <x-button.edit :url="route('admin.users.edit', $user)" text="Edit" />
                                    <x-button.delete :url="route('admin.users.destroy', $user)" text="Hapus" itemName="{{ $user->name }}" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">-tidak ada data-</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <x-pagination :data="$users" />
            </div>
        </div>
    </div>
</x-admin-layout>
