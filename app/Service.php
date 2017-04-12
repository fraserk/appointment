<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    //

    public function scopeGetServiceByOwner($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
    // public function scopeUpdatedService($service, $request)
    // {
    //     return $service->update($request);
    // }
    public function scopefindServiceById($query, $id)
    {
        return $query->where('id', $id);
    }
    // public function scopeupdateService($query, $request)
    // {
    //     return $query->update($request);
    // }

    public function timeslots()
    {
        return $this->hasMany(Slot::class);
    }
    public function company()
    {
        return  $this->belongsTo(Company::class);
    }

    public function addTimeSlot($company)
    {
        //return ;
      foreach ($company->hours as $hour) {
          $start = new \DateTime($hour->day_of_week .$hour->open_time);
          $end = new \Datetime($hour->day_of_week .$hour->close_time);
          $interval = new \DateInterval('PT30M');
          $period = new \DatePeriod($start, $interval, $end);

          foreach ($period as $dt) {
              $this->timeslots()->create(['period'=>$dt]);
          }
      }
    }
}
