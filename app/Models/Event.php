<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'price',
        'total_tickets',
        'available_tickets',
        'image',
        'category',
        'is_active',
        'status',
        'organizer_user_id',
        'referral_code',
    ];
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_user_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'event_id');
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'organizer_user_id');
    }
}
