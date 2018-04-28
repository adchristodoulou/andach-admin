<?php

namespace App\Http\Controllers;

use App\Company;
use App\Position;
use App\ReportingUnit;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function complete($date)
    {
        $positions = Position::atDate($date)->get();

        return view('position.complete', ['positions' => $positions]);
    }

    public function index()
    {
    	$positions = Position::current()->get();
    	$companies = Company::all()->pluck('name', 'id');
    	$reportingunits = ReportingUnit::all()->pluck('name', 'id');

    	if (old('company_id'))
    	{
    		$company = Company::find(old('company_id'));
    	} else {
    		$company = '';
    	}

    	return view('position.index', ['positions' => $positions, 'companies' => $companies, 'reportingunits' => $reportingunits, 'company' => $company]);
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
    	if (!$position->save())
    	{
    		session()->flash('there was an error');
    	}

    	return redirect()->route('position.index');
    }
}
