<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'bio',
        'mobile',
        'verify_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function discount()
    {
        return $this->hasMany(Discount::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function syncTags($productId)
    {
        // $tagsId = collect(explode(",", $tagString))  // sea,fire => collect(['sea', 'fire'])
        // ->filter()
        // ->map(function($tag){
        //     $tagsObj = Tag::firstOrCreate([
        //         'name' => trim($tag),
        //         'slug' => str($tag)->slug(),
        //     ]);
        //     return $tagsObj->id;
        // }); // => [1,7]
        $this->products()->sync($productId);
    }
}
