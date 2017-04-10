<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;

class userServiceController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware(['auth']);
    }
    public function index()
    {
        return Service::getServiceByOwner()->orderBy('id', 'desc')->get();
    }

    public function store()
    {
        $user = request()->user()->addService(request()->only(['name']));
        return response('created', 201);
    }

    public function update($user, $service)
    {
        $Userservice = Service::findServiceById($service)->GetServiceByOwner()->firstorfail()->update(request()->only(['name']));
        return response('Service Upate', 201);
    }

    public function destroy($user, $service)
    {
        $services = Service::findServiceById($service)->GetServiceByOwner()->firstorfail()->delete();
        return response('deleted', 201);
    }
}
