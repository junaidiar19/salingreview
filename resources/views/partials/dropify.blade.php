@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/css/dropify.min.css') }}">
    <style>
        .dropify-wrapper .dropify-preview .dropify-render img {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .dropify-wrapper .dropify-message p {
            font-size: 14px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
            }
        });
    </script>
@endpush