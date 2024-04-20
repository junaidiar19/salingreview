<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_raw' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $order->uuid = Str::uuid();
            $order->code = mt_rand(10000001, 99999999);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasOne(OrderDetail::class, 'order_id')->isProduct();
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function detail()
    {
        return $this->hasOne(OrderDetail::class, 'order_id');
    }

    // Attribute
    public function getProofUrlAttribute()
    {
        return $this->getFirstMediaUrl('proof');
    }

    public function getStatusLabelAttribute()
    {
        if ($this->status == OrderStatusEnum::PENDING) {
            return 'Pending';
        } elseif ($this->status == OrderStatusEnum::WAITING_CONFIRMATION) {
            return 'Waiting Confirmation';
        } elseif ($this->status == OrderStatusEnum::SUCCESS) {
            return 'Success';
        } elseif ($this->status == OrderStatusEnum::EXPIRED) {
            return 'Expired';
        } elseif ($this->status == OrderStatusEnum::FAILED) {
            return 'Failed';
        } elseif ($this->status == OrderStatusEnum::CANCELLED) {
            return 'Cancelled';
        }
    }

    // scopes

    /**
     * Scope a query to filter orders.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $params)
    {
        $query->when($params['search'] ?? null, function ($query, $search) {
            // search by code & user.name
            $query->where('code', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });
    }
}
