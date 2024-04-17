@props(['required' => false])

<label {!! $attributes->merge(['class' => 'form-label fw-semibold']) !!}>
    {{ $slot }}
    @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>
