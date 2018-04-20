<?php

namespace App\Http\Controllers;

use App\ReportingUnit;
use Illuminate\Http\Request;

class ReportingUnitController extends Controller
{
	public function index()
    {
    	$units = ReportingUnit::nested()->get();

    	return view('reportingunit.index', ['units' => $units]);
    }
}
