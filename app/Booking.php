<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $guarded = [];
  protected $dates = ['book_from', 'book_to'];
  protected $appends = ['start', 'end', 'title', 'allDay'];



  public function provider()
  {
    return $this->belongsTo(User::class, 'staff_id');
  }
  public function Service()
  {
    return $this->belongsTo(Service::class, 'service_id');
  }

  public function setWhenAttribute($value)
  {
    return $this->attributes['when'] = \Carbon\carbon::parse($value);
  }
  // public function getStartAttribute()
  // {
  //   $start = \Carbon\carbon::make($this->attributes['when']);
  //   return $start->toW3cString();
  // }
  // public function getEndAttribute()
  // {
  //   $duration = $this->service->attributes['duration'];
  //   $end = \Carbon\carbon::make($this->attributes['when'])->addMinutes($duration);
  //   return $end->toW3cString();
  // }
  public function getTitleAttribute()
  {

    return $this->attributes['customer_name'] . ' - ' . $this->service->attributes['name'];
  }
  public function getAllDayAttribute()
  {
    return false;
  }

}
