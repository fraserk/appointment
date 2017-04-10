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

    public function addTimeSlot()
    {
        return $this->timeslots()->create([]);
    }
}
