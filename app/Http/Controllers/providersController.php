<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class providersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Company $company)
    {
        return view('providers.index',compact('company'));
    }

    public function store()
    {

      $company = Company::where('user_id', auth()->user()->id)->firstorfail();
      $company->createProviders(request()->all());
      return view('providers.index', compact('company'));
    }
}
