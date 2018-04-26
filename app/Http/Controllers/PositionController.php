<?php

namespace App\Http\Controllers;

use App\Company;
use App\Position;
use App\ReportingUnit;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
    	$positions = Position::all();
    	$companies = Company::all()->pluck('name', 'id');
    	$reportingunits = ReportingUnit::all()->pluck('name', 'id');

    	return view('position.index', ['positions' => $positions, 'companies' => $companies, 'reportingunits' => $reportingunits]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required',
            'reporting_unit_id' => 'required',
            'job_id' => 'required',
            'from_date' => 'required',
            'weekly_hours_authorised' => 'required',
        ]);

    	$position = new Position($request->all());
    	$position->save();

    	return redirect()->route('position.index');
    }
}
