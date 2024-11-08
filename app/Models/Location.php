<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function workHour()
    {
        return $this->hasOne(WorkHour::class);
    }
}
