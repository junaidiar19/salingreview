@props(['id', 'url'])

@push('scripts')
    <script>
        $("#{{ $id }}").select2(options("{{ $url }}"));

        // select2-search__field autofocus
        $(document).on('select2:open', () => {
            document.querySelector(".select2-search__field").focus();
        });

        function options(url) {
            var options = {
                ajax: {
                    url: url,
                    data: function(params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        }

                        return query;
                    },
                    processResults: function(data) {
                        console.log(data);
                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    }
                },
                theme: "bootstrap-5",
                placeholder: '-Silakan Pilih-',
                minimumInputLength: 2,
                allowClear: true
            }

            return options;
        }
    </script>
@endpush
