<select name="order_status" class="form-select">
    <option value="">-Filter Status-</option>
    @foreach (\App\Enums\OrderStatusEnum::asSelectArray() as $key => $item)
        <option value="{{ $key }}" {{ @$_GET['order_status'] == $key ? 'selected' : '' }}>
            {{ $item }}
        </option>
    @endforeach
</select>
