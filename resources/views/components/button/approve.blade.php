@props(['url', 'hasIcon' => true, 'text' => null, 'size' => 'sm', 'itemName' => null, 'redirect' => null])

@php
    $btnSize = 'btn-md';

    if ($size == 'sm') {
        $btnSize = 'btn-sm';
    } elseif ($size == 'lg') {
        $btnSize = 'btn-lg';
    }
@endphp

<button class="btn btn-success action-approve {{ $btnSize }}" data-url="{{ $url }}"
    data-item="{{ $itemName }}" data-redirect="{{ $redirect }}">
    @if ($hasIcon)
        <i class="far fa-check-circle {{ $text ? 'me-1' : '' }}"></i>
    @endif

    @if ($text)
        {{ $text }}
    @endif
</button>
