@props(['name' => ''])

<select name="{{ $name }}" {!! $attributes->merge(['class' => 'form-select']) !!} onchange="this.form.submit()">
    {{ $slot }}
</select>
