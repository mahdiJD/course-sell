<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'file',
        'status',
        'published_at',
        'description',
        'bio',
        'price',
        'user_id'
    ];
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }
}
