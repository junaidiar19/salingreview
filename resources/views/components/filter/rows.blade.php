@props(['current' => 10])
@php
    $rows = [10, 30, 50, 100];
@endphp

<x-form.select name="row" onchange="this.form.submit()">
    @foreach ($rows as $row)
        <option value="{{ $row }}" {{ (@$_GET['row'] ?? $current) == $row ? 'selected' : '' }}>
            {{ $row }}
        </option>
    @endforeach
</x-form.select>
