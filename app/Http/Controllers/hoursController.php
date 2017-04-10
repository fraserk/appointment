<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Hour;

class hoursController extends Controller
{
    public function store(Company $company)
    {
        return $company->addStoreHours(request()->except('api_token'));
    }

    public function update(Company $company, Hour $hour, Request $request)
    {
        return $company->editHour($hour, $request->except('api_token'));
    }
}
