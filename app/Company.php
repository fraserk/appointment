<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hour;

class Company extends Model
{
    protected $fillable =['name','store_hours','street_address','city','state','zip_code','bio'];
    protected $casts= ['store_hours'=>'json'];

    public function hours()
    {
        return $this->hasMany(Hour::class);
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
