@props(['data' => []])

@if ($data)
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="text-sm mb-1 mb-sm-0">
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }}
            entries
        </div>
        <div class="text-sm">
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
@endif
