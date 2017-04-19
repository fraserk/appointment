<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->user = request()->user();
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


    public function show($user, $company)
    {
        return User::find($user)->firstorfail()->company;
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
