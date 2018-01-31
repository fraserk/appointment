<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hour;

class Company extends Model
{
    protected $guarded =[];
    protected $with =['service','staffs'];

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function staffs()
    {
        return $this->hasMany(User::class,'company_id');
    }
    public function addService($request)
    {
        $service = $this->service()->create($request);
        $service->addTimeSlot(auth()->user()->company);
        return $service;
    }

    public function addStaff($staff)
    {
        $staff =  $this->staffs()->create([
          'name' => $staff['name'],
          'email' => $staff['email'],
          'password' => bcrypt($staff['password'])
        ]);
        $staff->addSchedule($this->defaultSchedule()['schedule']);
        return $staff;
    }


    public function addStoreHours($storeHours)
    {
        foreach ($storeHours as $hours) {
            $this->hours()->create([
              'day_of_week'=>$hours['day_of_week'],
              'start' => \DateTime::createFromFormat('H:i A', $hours['start']),
              'end'=> \DateTime::createFromFormat('H:i A', $hours['end']),
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
          "schedule" =>  [
            [
              'day_of_week'=> 'Monday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
            [
              'day_of_week'=> 'Tuesday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
            [
              'day_of_week'=> 'Wednesday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
            [
              'day_of_week'=> 'Thursday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
            [
              'day_of_week'=> 'Friday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
            [
              'day_of_week'=> 'Saturday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
            [
              'day_of_week'=> 'Sunday',
              'start' => ('9:00 am'),
              'end'=> ('5:00 pm'),
              'is_open' => true
              ],
        ]
        ];
    }
}
