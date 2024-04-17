@props(['name' => 'password'])

<div class="input-group" x-data="{ show: true }">
    <input :type="show ? 'password' : 'text'" type="password" name="{{ $name }}" {!! $attributes->merge(['class' => 'form-control border-end-0']) !!}
        value="{{ old($name) }}" placeholder="•••••••••">
    <span class="input-group-text border-start-0 cursor-pointer px-3 bg-white" @click="show = !show">
        <i :class="show ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill'" class="text-muted"></i>
    </span>
</div>
