<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalDay extends Model
{
    /** @use HasFactory<\Database\Factories\FestivalDayFactory> */
    use HasFactory;
    
    protected $fillable = [
        'date',
        'description',
        'status',
    ];

    public function getCreatedAtAttribute($value)
    {
        return  Carbon::parse($value)->format('d-m-Y');
    }
}
