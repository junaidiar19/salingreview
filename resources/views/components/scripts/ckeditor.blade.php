@props(['id' => 'editor'])

@push('scripts')
    <script>
        ClassicEditor.create(document.querySelector("#{{ $id }}"), {
            simpleUpload: {
                // The URL that the images are uploaded to.
                uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}",
            }
        }).catch((error) => {
            console.error(error);
        });
    </script>
@endpush
