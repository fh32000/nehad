<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        'name', // 'Anlagenbez'
        'properties', // This could be a JSON field to store various properties like 'Eis', 'Sand', 'Asphalt', etc.
    ];
    public function facility()
{
    return $this->belongsTo(Facility::class);
}
}
