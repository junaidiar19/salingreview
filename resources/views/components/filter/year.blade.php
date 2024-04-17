@props(['placeholder' => '-Tahun-', 'currentYear' => @$_GET['year'], 'onChangeAction' => false])

{{-- select year from 2023 --}}
<select {!! $attributes->merge(['class' => 'form-select']) !!} name="year" @if ($onChangeAction == true) onchange="this.form.submit()" @endif>
    <option value="">{{ $placeholder }}</option>
    @for ($i = 2023; $i <= date('Y'); $i++)
        <option value="{{ $i }}" {{ $currentYear == $i ? 'selected' : '' }}>{{ $i }}</option>
    @endfor
</select>
