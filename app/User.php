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

    public function bookings(){
      return $this->hasMany(Booking::class,'staff_id');
    }

    public function addSchedule($schedule)
    {
      
      $this->schedules()->create($schedule);
    }

    public function updateSchedule($timeSchedule,$schedule)
    {
        $schedule->update($timeSchedule);
       return $schedule;

    }

    public function addCompany($request)
    {
        $company = $this->company()->create($request);
        //$company->addStoreHours($this->defaultSchedule());
        return $company;
    }
    public function getBookings()
    {
      return   $this->bookings()->with(['Provider','Service'])->get();
    }

    public function getBookingsByDay($date)
    {
      
      return $this->bookings()->whereDate('book_from',$date)->get();
    }

    public function defaultSchedule()
    {
        return [
            'opening_hours_mon' => ['08:00', '18:00'],
            'opening_hours_tue' => ['08:00', '18:00'],
            'opening_hours_wed' => ['08:00', '18:00'],
            'opening_hours_thur' => ['08:00', '18:00'],
            'opening_hours_fri' => ['08:00', '18:00'],
            'opening_hours_sat' => ['08:00', '18:00'],
            'opening_hours_sun' => ['08:00', '18:00'],
        ];
    }
}
