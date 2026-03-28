<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'location',
        'event_date',
        'event_price',
        'create_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

}
