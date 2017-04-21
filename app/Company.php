<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hour;

class Company extends Model
{
    protected $guarded =[];
    protected $with =['service'];

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function addService($request)
    {
        $service = $this->service()->create($request);
        $service->addTimeSlot(auth()->user()->company);
        return $service;
    }

    public function addStoreHours($storeHours)
    {
        foreach ($storeHours as $hours) {
            $this->hours()->create([
              'day_of_week'=>$hours['day_of_week'],
              'open_time' => \DateTime::createFromFormat('H:i A', $hours['open_time']),
              'close_time'=> \DateTime::createFromFormat('H:i A', $hours['close_time']),
              'is_open'=> $hours['is_open']
            ]);
        }
    }

    public function editHour($hour, $request)
    {
        $hour->update([
          'day_of_week'=>$request['day_of_week'],
          'open_time' => \DateTime::createFromFormat('H:i A', $request['open_time']),
          'close_time'=> \DateTime::createFromFormat('H:i A', $request['close_time']),
          'is_open'=> $request['is_open']
        ]);
    }
}
