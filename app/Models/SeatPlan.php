<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatPlan extends Model
{
    use HasFactory;
    public function bus() {
        return $this->belongsTo( Bus::class );
    }
    protected $fillable = ['bus_id','booking_time','total_seats','booking_status'];
}
