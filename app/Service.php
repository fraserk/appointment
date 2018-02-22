<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    //

    public function scopeGetServiceByCompany($query, $company)
    {
        return $query->where('company_id', $company->id);
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

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function workers()
    {
        return  $this->belongsToMany(User::class,'service_user','user_id','service_id');
    }

    public function addWorker($workers)
    {
        $this->workers()->sync($workers);
        return $this;
    }
    public function AddBooking($booking)
    {
        $this->bookings()->create($booking);
        return $this;
    }
    public function addTimeSlot($company)
    {
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
