<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class schedulesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function create()
    {
      $schedules = auth()->user()->schedules;
      return View('schedules.create',compact('schedules'));
    }

    public function update(Schedule $schedule)
    {
      
      return auth()->user()->updateSchedule(request()->only('day_of_week','start','end','is_open'),$schedule);

    }
}
