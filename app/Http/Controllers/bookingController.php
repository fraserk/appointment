<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Classes\StoreHours;
use Carbon\carbon;
use Carbon\CarbonInterval;

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
        $day_of_the_week = carbon::parse(request('date'))->format('D');    
        //dd($user->getAppointmentsByDay(request('date')));;    
        //dd($user->getAppointmentsByDay(request('date')));        
        $date = $user->schedules()->pluck('opening_hours_'.strtolower($day_of_the_week));
        $bookings = $user->getBookingsByDay(request('date'));
            
            $start = Carbon::instance(new \DateTime(request('date') . $date['0']['0']));
            $end = Carbon::instance(new \Datetime(request('date') . $date['0']['1']));
            //$interval = new \DateInterval('PT' . $service->duration . 'M');
            $interval = CarbonInterval::minutes($service->duration);
            $period = new \DatePeriod($start->addMinute(5), $interval, $end);
            $slots = collect($period);
            $myslots = $slots->map(function($items,$keys) use($bookings){
                //  dd($items->between(\Carbon\carbon::parse('2018-08-24 07:00:00'), \Carbon\carbon::parse('2018-08-24 07:30:00')));
                 foreach ($bookings as $book) {
                    
                    if (($items >=  $book->book_from) && ($items <= $book->book_to)) {
                        return [
                           'slot' => $items->subMinute(5)->format('m-d-y h:i a'),
                           'Booked' =>true
                       ];
                       
                    }
                // return [
                //     'slot' => $items->subMinute(5)->format('m-d-y h:i a'),
                //     'Booked' => false
                // ];
                 };
            return [
                'slot' => $items->subMinute(5)->format('m-d-y h:i a'),
                'Booked' => false
            ]; 
            });
            
            return collect($myslots);
        
    }
}