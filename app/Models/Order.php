<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'pay',
        'payment_status',
    ];

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
