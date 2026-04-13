<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopBooking extends Model
{
    protected $fillable = ['full_name', 'email', 'booking_date', 'guests', 'additional_info'];
}
