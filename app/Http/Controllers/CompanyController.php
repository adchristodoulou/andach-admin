<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
    	$companies = Company::all();

    	return view('company.index', ['companies' => $companies]);
    }
}
