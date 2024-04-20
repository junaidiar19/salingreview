@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2.select2-container.select2-container--default{
            width: 100%;
            display: inherit;
        }

        /* single select2 */
        .select2-selection.select2-selection--single{
            height: 40px;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 38px;
        }
        /* end single select 2 */
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2-input').select2();
        });
    </script>
@endpush