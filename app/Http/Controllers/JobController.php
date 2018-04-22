<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Company;
use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
    	$companies = Company::all()->pluck('name', 'id');
    	$contracts = Contract::all();

    	return view('job.form', ['companies' => $companies, 'contracts' => $contracts]);
    }

    public function edit($id)
    {
        $job = Job::find($id);
		$companies = Company::all()->pluck('name', 'id');
    	$contracts = Contract::all();
    	
        return view('job.form', ['job' => $job, 'companies' => $companies, 'contracts' => $contracts]);
    }

    public function index()
    {
    	$jobs = Job::all();

    	return view('job.index', ['jobs' => $jobs]);
    }

    public function store(Request $request)
    {
    	$job = new Job($request->all());
	    $job->save();

	    $job->setAllowedContracts($request->allowedContract);
	    $job->setAuthorisedSalaries($request->authSalariesFrom, $request->authSalariesTo);

	    return redirect()->route('job.index');
    }

    public function update(Request $request)
    {
        $checkboxes = ['requires_dbs_check_standard', 'requires_dbs_check_child_barred', 'requires_dbs_check_adult_barred', 'requires_dbs_check_extended', 'requires_criminal_information', 'requires_spent_criminal_information'];

        foreach ($checkboxes as $value)
        {
            if (!isset($request->$value))
            {
                $request[$value] = 0;
            }
        }

        $job = Job::find($request->id);
        $job->update($request->all());
        $job->save();

	    $job->setAllowedContracts($request->allowedContracts);
	    $job->setAuthorisedSalaries($request->authSalariesFrom, $request->authSalariesTo);

        return redirect()->route('job.index');
    }
}
