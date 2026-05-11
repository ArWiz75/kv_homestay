<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'room_id', 'guest_name', 'guest_email', 'guest_phone', 'check_in', 'check_out', 'status'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
