<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];
    protected $dates = ['when'];

    public function setWhenAttribute($value)
        {
          return $this->attributes['when'] =  \Carbon\carbon::parse($value);
        }

     public function provider()
     {
       return $this->belongsTo(User::class,'staff_id');
     }   
     public function Service()
     {
       return $this->belongsTo(Service::class,'service_id');
     }  
     

}
