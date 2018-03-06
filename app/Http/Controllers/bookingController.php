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
        $this->middleware('auth')->except(['show', 'providerSchedule', 'store']);
    }


    public function show(Service $service)
    {
        //dd($service->company);
        return View('services.show', compact('service'));

    }
    public function store(Service $service, User $user)
    {

        $service->addBooking(request()->all());
        return response('booking save', 200);
    }

    public function providerSchedule(Service $service, User $user)
    {

        $date = $user->schedules()->where('day_of_week', carbon::parse(request('date'))->format('l'))->first();
        foreach ($user->schedules as $hour) {
            $start = new \DateTime(request('date') . $date->start);
            $end = new \Datetime(request('date') . $date->end);
            $interval = new \DateInterval('PT' . $service->duration . 'M');
            $period = new \DatePeriod($start, $interval, $end);

            return collect($period);
        }
    }
}