<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
