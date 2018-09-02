<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class CalendarController extends Controller
{
    public function index()
    {
        $appointments = auth()->user()->getAppointments();
        
        return View('calendar.show',compact('appointments'));
    }
}
