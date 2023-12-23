<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {
    use HasFactory;
    public function bus() {
        return $this->belongsTo( Bus::class );
    }

    public function trip() {
        return $this->belongsTo( Trip::class );
    }

    protected $fillable = [
        'bus_id',
        'trip_id',
        'departure_time',
        'fare',
    ];

    public function booking() {
        return $this->hasMany( Booking::class );
    }
}
