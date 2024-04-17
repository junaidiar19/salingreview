@props(['label' => '', 'data', 'table', 'url' => route('published.update')])

<div class="form-check form-switch mb-0">
    <input class="form-check-input" type="checkbox" id="update-published-{{ $data->id }}" data-url="{{ $url }}"
        data-table="{{ $table }}" onchange="toggleUpdatePublished('{{ $data->id }}')"
        {{ $data->is_published ? 'checked' : '' }}>
    @if (@$label)
        <label class="form-check-label" for="update-published-{{ $data->id }}">
            {{ $label }}
        </label>
    @endif
</div>
