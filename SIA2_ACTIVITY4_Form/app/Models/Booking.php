<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'name',
    'email',
    'age',
    'event_type',
    'event_date',
    'special_request',
    ];
}
