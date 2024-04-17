@props(['url'])

<a href="{{ @$_GET['back'] ?? $url }}" {!! $attributes->merge(['class' => '']) !!}>
    <i class="fas fa-angle-left me-1"></i> Kembali
</a>
