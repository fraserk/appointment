<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];
    protected $casts = [
        'opening_hours_mon' =>'array',
        'opening_hours_tue' =>'array',
        'opening_hours_wed' =>'array',
        'opening_hours_thu' =>'array',
        'opening_hours_fri' =>'array',
        'opening_hours_sat' =>'array',
        'opening_hours_sun' =>'array',
    ];

    public function setStartAttribute($value)
    {
      return $this->attributes['start'] =  \DateTime::createFromFormat('H:i A', $value);
    }
    public function setEndAttribute($value)
    {
      return $this->attributes['end'] =  \DateTime::createFromFormat('H:i A', $value);
    }

    public function getStartAttribute($value)
    {

        return   date('h:i A', strtotime($value));
    }
    public function getEndAttribute($value)
    {
        return   date('h:i A', strtotime($value));
    }
    public function getDayOfWeekAttribute($value)
    {
        return   date('D', strtotime($value));
    }
}
