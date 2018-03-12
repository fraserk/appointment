<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Company;
use Carbon\carbon;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Company $company)
    {
        return Service::GetServiceByCompany($company)->orderBy('id', 'desc')->get();
    }

    public function create(){
        $company = auth()->user()->company;
        return View('services.create',compact('company'));
    }

    public function store()
    {
        $staff = collect(request()->only('staff'));
        $data = $staff->collapse();
        $company = Company::where('user_id',auth()->user()->id)->firstorfail();
        $service= $company->addService(request()->only(['name','price','duration','detail']));
        $service->addWorker($data->all());
        return response('Service Created Successully',200);
    }

    public function update($service)
    {
        $Userservice = Service::findServiceById($service)->firstorfail()->update(request()->only(['name']));
        return response('service updated', 200);
    }

    public function show(Company $company, Service $service)
    {
        $date = $company->hours()->where('day_of_week', carbon::parse(request('date'))->format('l'))->first();
        foreach ($company->hours as $hour) {
            $start = new \DateTime(request('date') .$date->open_time);
            $end = new \Datetime(request('date') .$date->close_time);
            $interval = new \DateInterval('PT60M');
            $period = new \DatePeriod($start, $interval, $end);

            return collect($period);
          // foreach ($period as $dt) {
          //     $this->timeslots()->create(['period'=>$dt]);
          // }
        }
        //return $service->timeslots()->whereDate('period', request()->get('date'))->get();
    }
    public function destroy($user, $service)
    {
        $services = Service::findServiceById($service)->firstorfail()->delete();
        return response('deleted', 201);
    }
}
