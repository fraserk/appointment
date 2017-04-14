<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function addService($request)
    {
        $service = $this->service()->create($request);
        $service->addTimeSlot(auth()->user()->company);
    }

    public function addCompany($request)
    {
        $storehours =  $this->defaultStoreHours();
        $company = $this->company()->create($request);
        $company->addStoreHours($storehours);
        return $company;
    }

    private function defaultStoreHours()
    {
        return [
          [
            'day_of_week'=> 'Monday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
          [
            'day_of_week'=> 'Tuesday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
          [
            'day_of_week'=> 'Wednesday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
          [
            'day_of_week'=> 'Thursday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
          [
            'day_of_week'=> 'Friday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
          [
            'day_of_week'=> 'Saturday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
          [
            'day_of_week'=> 'Sunday',
            'open_time' => ('9:00 am'),
            'close_time'=> ('5:00 pm'),
            'is_open' => true
          ],
      ];
    }
}
