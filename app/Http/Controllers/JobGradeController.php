<?php

namespace App\Http\Controllers;

use App\JobGrade;
use Illuminate\Http\Request;

class JobGradeController extends Controller
{
    public function index()
    {
    	$grades = JobGrade::all();

    	return view('jobgrade.index', ['grades' => $grades]);
    }
}
