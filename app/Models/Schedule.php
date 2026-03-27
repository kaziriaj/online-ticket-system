<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'start_time',
        'end_time',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
