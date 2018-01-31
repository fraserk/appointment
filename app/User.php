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
        'name', 'email', 'password','api_token','company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function schedules()
    {
      return $this->hasMany(Schedule::class,'staff_id');
    }

    public function addSchedule($schedule)
    {
      $this->schedules()->createMany($schedule);
    }

    public function updateSchedule($timeSchedule,$schedule)
    {
        $schedule->update($timeSchedule);
       //return $schedule;

    }

    public function addCompany($request)
    {
        $company = $this->company()->create($request);
        //$company->addStoreHours($this->defaultStoreHours());
        return $company;
    }

    private function defaultStoreHours()
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
