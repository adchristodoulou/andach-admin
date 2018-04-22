<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Formulator;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function create()
    {
    	return view('contract.form');
    }

    public function edit($id)
    {
        $contract = Contract::find($id);

        return view('contract.form', ['contract' => $contract]);
    }

    public function index()
    {
    	$contracts = Contract::all();

    	return view('contract.index', ['contracts' => $contracts]);
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
	        'name' => 'required',
	        'fte_hours_per_week' => 'required',
	        'annual_hours_holiday' => 'required',
	        'notice_period_days' => 'required',
	        'overtime_multiplier' => 'required',
	        'pension_match_up_to_percent' => 'required',
	        'pension_multipler' => 'required',
	    ]);

	    $contract = new Contract($request->all());
	    $contract->save();

	    $contract->updateSickPay($request->from_months, $request->weeks_sick_pay);

	    return redirect()->route('contract.index');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'fte_hours_per_week' => 'required',
            'annual_hours_holiday' => 'required',
            'notice_period_days' => 'required',
            'overtime_multiplier' => 'required',
            'pension_match_up_to_percent' => 'required',
            'pension_multipler' => 'required',
        ]);

        $contract = Contract::find($request->id);
        $contract->update($request->all());
        $contract->save();

        $contract->updateSickPay($request->from_months, $request->weeks_sick_pay);

        return redirect()->route('contract.index');
    }
}
