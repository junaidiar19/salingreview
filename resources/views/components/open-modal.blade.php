@props(['size' => 'modal-md'])

<div class="modal modal-blur fade open-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $size }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-custom"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-custom">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-secondary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const modalable = document.querySelector('.open-modal');

        if (modalable) {
            modalable.addEventListener('show.bs.modal', e => {
                var title = $(e.relatedTarget).data('title');
                var url = $(e.relatedTarget).data('url');

                modalable.querySelector('.modal-title-custom').innerHTML = title;

                // load ajax
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        modalable.querySelector('.modal-body-custom').innerHTML = response;
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            })
        }
    </script>
@endpush
