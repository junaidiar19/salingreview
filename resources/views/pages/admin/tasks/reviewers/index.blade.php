<x-admin-layout>
    @include('partials.fancybox')

    <x-between class="mb-4">
        <h4 class="mb-0">Monitoring Reviewer</h4>
        <x-button.back :url="route('admin.tasks.index')" />
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
                            <th>Nama Reviewer</th>
                            <th>Email</th>
                            <th>Tanggal Submit</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <a href="#" target="_blank">
                                    John Doe
                                </a>
                            </td>
                            <td>johndoe@mail.com</td>
                            <td>12-12-2021</td>
                            <td>
                                <a href="{{ asset('assets/home/images/blog/post-1.jpg') }}" data-fancybox="gallery" data-caption="reviewer #1">Bukti</a>
                            </td>
                            <td>
                                <span class="badge bg-primary">Diterima</span>
                            </td>
                            <td>
                                -
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <a href="#" target="_blank">
                                    Jane Doe
                                </a>
                            </td>
                            <td>janedoe@mail.com</td>
                            <td>12-12-2021</td>
                            <td>
                                <a href="{{ asset('assets/home/images/blog/post-1.jpg') }}" data-fancybox="gallery" data-caption="reviewer #2">Bukti</a>
                            </td>
                            <td>
                                <span class="badge bg-secondary">Ditolak</span>
                            </td>
                            <td>
                                -
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <a href="#" target="_blank">
                                    Jhon Hendoe
                                </a>
                            </td>
                            <td>jhendoe@mail.com</td>
                            <td>12-12-2021</td>
                            <td>
                                <a href="{{ asset('assets/home/images/blog/post-1.jpg') }}" data-fancybox="gallery" data-caption="reviewer #3">Bukti</a>
                            </td>
                            <td>
                                <span class="badge bg-warning">Menunggu</span>
                            </td>
                            <td>
                                <x-button.approve text="Approve" url="#" />
                                <button 
                                    class="btn btn-danger btn-sm btn-reject"
                                    data-url="#"
                                    >
                                    Reject
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal.reject 
        modalId="rejectModal"
        formId="rejectModalForm"
        item="Tugas Reviewer"
        btnReject="btn-reject"
    />

    @push('scripts')
        <script>
            Fancybox.bind("[data-fancybox]", {});
        </script>
    @endpush
</x-admin-layout>