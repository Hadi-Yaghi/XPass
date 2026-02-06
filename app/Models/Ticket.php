<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'event_id',
        'type',
        'price',
        'quantity',
        'status',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'ticket_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
