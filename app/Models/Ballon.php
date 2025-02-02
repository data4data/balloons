<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballon extends Model
{
    /** @use HasFactory<\Database\Factories\BallonFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'pilot_id',
    ];

    public function getCreatedAtAttribute($value)
    {
        return  Carbon::parse($value)->format('d-m-Y');
    }
}
