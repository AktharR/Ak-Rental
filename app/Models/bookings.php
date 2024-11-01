<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'E_mail',
        'phone',
        'NIC',
        'booking_date',
        'car_id'

    ];

    public function car(){
        return $this->belongsTo(cars::class,'car_id');
    }
}