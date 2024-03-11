<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // 'Bezeichnung der Sportstätte'
        'location', // This could represent a combination of 'Ort', 'Strasse', 'Hausnr', and 'Zusatz'
        'longitude', // 'Laengengrad'
        'latitude', // 'Breitengrad'
    ];

    public function venues()
{
    return $this->hasMany(Venue::class);
}
}
