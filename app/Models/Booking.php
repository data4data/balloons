<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    
    protected $fillable = [
        'special_requests',
        'people_count',
        'customer_id',
        'balloon_id',
        'festival_day_id',
    ];

    public function getCreatedAtAttribute($value)
    {
        return  Carbon::parse($value)->format('d-m-Y');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function ballon()
    {
        return $this->belongsTo(Ballon::class, 'balloon_id', 'id');
    }

    public function festivalDay()
    {
        return $this->belongsTo(FestivalDay::class, 'festival_day_id', 'id');
    }
}
