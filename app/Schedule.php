<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

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
