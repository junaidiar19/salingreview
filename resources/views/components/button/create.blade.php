@props(['url', 'hasIcon' => true, 'text' => null, 'size' => 'md'])

@php
    $btnSize = 'btn-md';

    if ($size == 'sm') {
        $btnSize = 'btn-sm';
    } elseif ($size == 'lg') {
        $btnSize = 'btn-lg';
    }
@endphp

<a href="{{ route('admin.products.create') }}" class="btn btn-primary {{ $btnSize }}">
    @if ($hasIcon)
        <i class="fas fa-plus-circle {{ $text ? 'me-1' : '' }}"></i>
    @endif

    @if ($text)
        {{ $text }}
    @endif
</a>
