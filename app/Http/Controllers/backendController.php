<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backendController extends Controller
{
    public function __construct()
    {
        $this->user = request()->user();
        $this->middleware('auth');
    }
    public function services()
    {
        return View('services.index');
    }

    public function settings()
    {
        $user= auth()->user()->with('company.hours')->firstorfail();
        //dd($user->company->hours['0']->formatted_open_time);
        return View('settings.index', compact('user'));
    }

    public function getHours()
    {
        $user = auth()->user()->with('company.hours')->firstorfail();
        return $user->company->hours;
    }
}
