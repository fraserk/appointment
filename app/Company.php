<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hour;

class Company extends Model
{
    protected $guarded =[];
    protected $with =['service','providers'];

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function providers()
    {
        return $this->hasMany(User::class,'company_id');
    }
    public function addService($request)
    {
        $service = $this->service()->create($request);
        //$service->addTimeSlot(auth()->user()->company);
        return $service;
    }

    public function createProviders($provider)
    {
        $staff =  $this->providers()->create([
          'name' => $provider['name'],
          'email' => $provider['email'],
          'password' => bcrypt($provider['password'])
        ]);
        $staff->addSchedule($this->defaultSchedule());

        return $staff;
    }


    public function addStoreHours($storeHours)
    {
      
        foreach ($storeHours['schedule'] as $hours) {
            $this->hours()->create([
              'day_of_week'=>$hours['day_of_week'],
              'open_time' => \DateTime::createFromFormat('H:i A', $hours['start']),
              'close_time'=> \DateTime::createFromFormat('H:i A', $hours['end']),
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

    private function defaultSchedule()
    {
         return [
          'opening_hours_mon' => ['08:00', '12:00'],
          'opening_hours_tue' => ['08:00', '12:00'],
          'opening_hours_wed' => ['08:00', '12:00'],
          'opening_hours_thu' => ['08:00', '22:00'],
          'opening_hours_fri' => ['00:00', '24:00'],
          'opening_hours_sat' => ['08:00', '12:00'],
          'opening_hours_sun' => ['08:00', '24:00'],
        ];
    }
}
