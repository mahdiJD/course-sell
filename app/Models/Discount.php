<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    // protected $primaryKey = 'code';
    protected $casts = [
        'status' => 'boolean',
    ];
    protected $fillable = [
        'code',
        'discount',
        'count',
        'status',
        'user_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
