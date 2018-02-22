<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Classes\StoreHours;
use Carbon\carbon;

class bookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $data = $user->with('company.hours', 'company.service')->firstorfail();

        $storeHours = $user->schedules;
        $hoursArray = $storeHours->map(function ($item, $key) {
            return [
              str_limit(lcfirst($item['day_of_week']), 3, '')=>[date('H:i', strtotime($item['open_time'])) .'-'.date('H:i', strtotime($item['close_time']))]];
        });
        $hours = $hoursArray->collapse()->toarray();
        $store_hours = new StoreHours($hours);
        //dd($hours, $user->company->store_hours, $store_hours->hours_overview());
        return View('appointments.index', compact('data', 'store_hours'));
    }
    public function show(Service $service)
    {
        
        return View('services.show', compact('service'));

        //   $period = $service->timeslots()->whereBetween('period', [
            // Carbon::parse('4/10/2017')->startOfDay(),
            // Carbon::parse('4/16/2017')->endOfDay(),
            // ])->get()
            //   ->groupBy(function ($date) {
            //       return Carbon::parse($date->period)->format('Y-m-d');
            //   });
    }
    public function store(Service $service, User $user)
    {
        $service->addBooking(request()->all());
        return response('booing save', 200);
    }

    public function providerSchedule(Service $service, User $user)
    {
        //dd(carbon::parse(request('date'))->format('l'));
        $date = $user->schedules()->where('day_of_week', carbon::parse(request('date'))->format('l'))->first();
       // dd(carbon::parse(request('date'))->format('l'));
        foreach ($user->schedules as $hour) {
            $start = new \DateTime(request('date') .$date->start);
            $end = new \Datetime(request('date') .$date->end);
            $interval = new \DateInterval('PT'.$service->duration .'M');
            $period = new \DatePeriod($start, $interval, $end);

            return collect($period);
     }
    }
}