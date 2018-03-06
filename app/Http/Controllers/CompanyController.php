<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Classes\StoreHours;
use Carbon\carbon;

class companyController extends Controller
{
    public function __construct()
    {
        $this->user = request()->user();
        //$this->middleware(['auth']);
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->user->addCompany($request->except('api_token'));
        return response('Created', 201);
    }


    public function show(Company $company)
    {
        //$storeHours = $company->hours;
        // $hoursArray = $storeHours->map(function ($item, $key) {
        //     return [
        //       str_limit(lcfirst($item['day_of_week']), 3, '')=>[date('H:i', strtotime($item['open_time'])) .'-'.date('H:i', strtotime($item['close_time']))]];
        // });
        //$hours = $hoursArray->collapse()->toarray();
       // $store_hours = new StoreHours($hours);
        return View ('companies.show', compact('company'));
        //return User::find($user)->firstorfail()->company;
    }


    public function edit($id)
    {
        //
    }


    public function update($user, $company)
    {
        $user = User::find($user)->firstorfail();

        $user->company()->update([
          'name' => request()->get('name'),
          'bio' => request()->get('bio'),
          'street_address' => request()->get('street_address'),
          'state' => request()->get('state'),
          'city' => request()->get('city'),
          'zip_code' => request()->get('zip_code')
        ]);
    }


    public function destroy($id)
    {
        //
    }
}
