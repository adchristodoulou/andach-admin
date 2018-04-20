<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Formulator;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function create()
    {
    	$form = new Formulator(['route' => 'contract.store', 'dontcloseform' => 1]);
    	$form->addElement(['type' => 'lefttext', 'name' => 'name', 'title' => 'Name']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'fte_hours_per_week', 'title' => 'FTE Hours Per Week']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'annual_hours_holiday', 'title' => 'Hours Holiday Per Year']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'notice_period_days', 'title' => 'Notice Period (Days)']);
    	$form->addElement(['type' => 'leftcheckbox', 'name' => 'bank_holidays_off', 'value' => 1, 'title' => 'Is the employee required to take bank holidays off?']);
    	$form->addElement(['type' => 'leftcheckbox', 'name' => 'will_work_nights', 'value' => 1, 'title' => 'Will the job involve working nights?']);

    	$form->addElement(['type' => 'block', 'name' => 'block1', 'value' => '<h2>Pension and Overtime</h2><div class="alert alert-info">Floopy doopy do</div>']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'overtime_multiplier', 'title' => 'What is the multiplier for overtime?']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'pension_match_up_to_percent', 'title' => 'What percentage will pension match to?']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'pension_multipler', 'title' => 'What multiple of pension contributions will be matched?']);
    	$form->addElement(['type' => 'lefttext', 'name' => 'pension_match_delay_months', 'title' => 'Delay in month before pensions start matching']);

    	$form->addElement(['type' => 'block', 'name' => 'block2', 'value' => '<h2>Sick Pay</h2><div class="alert alert-info">Floopy doopy doo again</div>']);

    	return view('contract.form', ['form' => $form]);
    }

    public function edit($id)
    {
    	
    }

    public function index()
    {
    	$contracts = Contract::all();

    	return view('contract.index');
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
}
