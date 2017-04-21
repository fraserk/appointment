<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $guarded =[];
    protected $dates =['period'];

    public function getPeriodAttribute($value)
    {
        return date('h:i A', strtotime($value));
    }
}
