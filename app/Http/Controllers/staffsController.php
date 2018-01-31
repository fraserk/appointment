<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class staffsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Company $company)
    {
        return view('staff.index',compact('company'));
    }

    public function store()
    {

      $company = Company::where('user_id', auth()->user()->id)->firstorfail();
      $company->addStaff(request()->all());
      return view('staff.index', compact('company'));
    }
}
