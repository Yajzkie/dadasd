<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Either use fillable to define what attributes can be mass-assigned:
    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'number_of_cots',
        'early_juvenile',
        'juvenile',
        'sub_adult',
        'adult',
        'activity_type',
        'observer_category',
        'municipality',
        'date_of_sighting',
        'time_of_sighting',
        'photo',
    ];

    // Or use guarded to block mass-assignment for certain attributes:
    // protected $guarded = ['id'];
}

