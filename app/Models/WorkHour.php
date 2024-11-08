<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    protected $guarded = ['id'];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
