<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function scopeIsProduct($query)
    {
        return $query->where('product_type', Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
