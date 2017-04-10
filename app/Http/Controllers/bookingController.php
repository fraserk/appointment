<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Classes\StoreHours;

class bookingController extends Controller
{
    public function index(User $user)
    {
        $user = $user->with('company.hours', 'service')->firstorfail();

        $storeHours = $user->company->hours;
        $hoursArray = $storeHours->map(function ($item, $key) {
            return [
              str_limit(lcfirst($item['day_of_week']), 3, '')=>[date('H:i', strtotime($item['open_time'])) .'-'.date('H:i', strtotime($item['close_time']))]];
        });
        $hours = $hoursArray->collapse()->toarray();
        $store_hours = new StoreHours($hours);
        //dd($hours, $user->company->store_hours, $store_hours->hours_overview());
        return View('appointments.index', compact('user', 'store_hours'));
    }
    public function show(Service $service)
    {
        $start = new \DateTime('10:00');
        $end = new \Datetime('13:59');
        $interval = new \DateInterval('PT30M');
        $occurance = '5';
        $period = new \DatePeriod($start, $interval, $occurance);


        return View('services.show', compact('service', 'period'));
    }
}
