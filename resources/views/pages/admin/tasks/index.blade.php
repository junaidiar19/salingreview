<x-admin-layout>
    <x-between class="mb-4">
        <h4 class="mb-0">Tugas</h4>
        <x-button.create :url="route('admin.tasks.create')" text="Tambah Tugas" />
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
                <table class="table table-borderless table-rounded whitespace-nowrap">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Aksi</th>
                            <th>Judul</th>
                            <th>Produk</th>
                            <th>Tanggal Mulai</th>
                            <th>Kuota</th>
                            <th>Kuota Harian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td>{{ increment($tasks, $loop) }}</td>
                                <td>
                                    <x-button.delete :url="route('admin.tasks.destroy', $task)" itemName="{{ $task->name }}" />
                                    <x-button.edit :url="route('admin.tasks.edit', $task)" />
                                    <button data-bs-toggle="modal" data-bs-target=".open-modal"
                                        data-title="Detail Tugas" data-url="{{ route('admin.tasks.show', $task) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>
                                </td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->product->name }}</td>
                                <td>{{ formatTanggalIndo($task->start_date)->shortMonth() }}</td>
                                <td>{{ $task->quota }}</td>
                                <td>{{ $task->daily_quota }}</td>
                                <td>
                                    @if ($task->is_published)
                                        <span class="badge bg-success">Publish</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" align="center">-tidak ada data-</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-open-modal size="modal-lg" />
</x-admin-layout>
