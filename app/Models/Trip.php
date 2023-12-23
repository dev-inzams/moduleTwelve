<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model {
    use HasFactory;
    public function schedules() {
        return $this->hasMany( Schedule::class );
    }
    public function bookings() {
        return $this->hasMany( Booking::class );
    }
    protected $fillable = [
        'name',
    ];
}
