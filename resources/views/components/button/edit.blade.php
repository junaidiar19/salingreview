@props(['url', 'hasIcon' => true, 'text' => null, 'size' => 'sm'])

@php
    $btnSize = 'btn-md';

    if ($size == 'sm') {
        $btnSize = 'btn-sm';
    } elseif ($size == 'lg') {
        $btnSize = 'btn-lg';
    }
@endphp

<a href="{{ $url }}" class="btn btn-success shadow-sm {{ $btnSize }}">
    @if ($hasIcon)
        <i class="fas fa-edit {{ $text ? 'me-1' : '' }}"></i>
    @endif

    @if ($text)
        {{ $text }}
    @endif
</a>
