<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Company;

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

    public function store(Company $company)
    {
        $user = $company->addService(request()->only(['name','price','duration']));
        return response('created', 201);
    }

    public function update($user, $service)
    {
        $Userservice = Service::findServiceById($service)->firstorfail()->update(request()->only(['name']));
        return response('Service Upate', 201);
    }

    public function show(Company $company, Service $service)
    {
        return $service->timeslots()->whereDate('period', request()->get('date'))->get();
    }
    public function destroy($user, $service)
    {
        $services = Service::findServiceById($service)->firstorfail()->delete();
        return response('deleted', 201);
    }
}
