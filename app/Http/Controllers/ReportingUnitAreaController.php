<?php

namespace App\Http\Controllers;

use App\ReportingUnitArea;
use Illuminate\Http\Request;

class ReportingUnitAreaController extends Controller
{
    public function index()
    {
    	$areas = ReportingUnitArea::all();

    	return view('reportingunitarea.index', ['areas' => $areas]);
    }
}
