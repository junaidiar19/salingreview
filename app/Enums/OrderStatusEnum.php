<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatusEnum extends Enum
{
    const PENDING = 'pending';
    const WAITING_CONFIRMATION = 'waiting_confirmation';
    const SUCCESS = 'success';
    const EXPIRED = 'expired';
    const FAILED = 'failed';
    const CANCELLED = 'cancelled';
}
