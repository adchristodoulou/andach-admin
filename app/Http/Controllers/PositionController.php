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
    	$position = new Position($request->all());
    	$position->save();

    	return redirect()->route('position.index');
    }
}
