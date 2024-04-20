<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body px-4">
                <div class="px-4 d-inline-block rounded-circle mb-3" style="background-color: #FEF3F2">
                    <div class="py-3 rounded-circle text-danger">
                        <div style="background-color: #FEE4E2;"></div>
                        <i class="fas fa-exclamation-circle fs-2"></i>
                    </div>
                </div>

                <h5 class="fw-medium mb-2">Apakah Kamu Yakin?</h5>
                <p class="text-muted-tms">
                    {{ @$message ?? 'Yakin ingin membatalkan' }} {{ $item }} ini? Tindakan ini
                    <br>
                    tidak bisa dikembalikan.
                </p>

                <form action="" id="{{ $formId }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="mb-3">
                        <x-form.input-label>Alasan</x-form.input-label>
                        <x-form.textarea name="reason" rows="5" placeholder="Masukkan Alasan Pembatalan"></x-form.textarea>
                        <x-form.input-error name="reason" />
                    </div>

                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-danger fw-medium">Ya, Lanjutkan</button>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="button" class="btn btn-outline-secondary text-dark fw-medium" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('.{{ $btnReject }}').on('click', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            $('#{{ $formId }}').attr('action', url);
            $('#{{ $modalId }}').modal('show');
        });
    });
</script>
@endpush
