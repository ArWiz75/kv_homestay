<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_weekly',
        'price_monthly',
        'amenities',
        'image',
        'is_popular',
        'is_available',
    ];

    protected $casts = [
        'amenities' => 'array',
        'is_popular' => 'boolean',
        'is_available' => 'boolean',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
