@php
    use App\Enums\OrderStatusEnum;

    if ($status == OrderStatusEnum::PENDING) {
        $color = 'warning';
    } elseif ($status == OrderStatusEnum::WAITING_CONFIRMATION) {
        $color = 'info';
    } elseif ($status == OrderStatusEnum::SUCCESS) {
        $color = 'success';
    } elseif ($status == OrderStatusEnum::FAILED) {
        $color = 'danger';
    } elseif ($status == OrderStatusEnum::CANCELLED) {
        $color = 'secondary';
    }
@endphp

<span class="badge bg-{{ $color }}">
    {{ $slot }}
</span>