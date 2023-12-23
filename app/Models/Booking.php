<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'schedule_id',
        'seat_number',
        'amount_paid'
    ];

    public function schedule() {
        return $this->belongsTo( Schedule::class );
    }
    public function trip() {
        return $this->belongsTo( Trip::class );
    }
}
