<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $guarded = [];
    protected $dates =[];

    public function getopenTimeAttribute($value)
    {
        return   date('h:i A', strtotime($value));
    }
    public function getcloseTimeAttribute($value)
    {
        return   date('h:i A', strtotime($value));
    }
}
