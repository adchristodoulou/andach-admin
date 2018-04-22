@extends('template')

@section('content')
	<h1>Create or Edit Contract</h1>
	
	@if (isset($contract))
		{!! Form::model($contract, ['route' => 'contract.update']) !!}
		{{ Form::hidden('id', $contract->id) }}
	@else
		{!! Form::open(['route' => 'contract.store']) !!}
	@endif

	<div class="row">
		<div class="col-2">{{ Form::text('name', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('name', 'Name') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('fte_hours_per_week', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('fte_hours_per_week', 'FTE Hours Per Week') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('annual_hours_holiday', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('annual_hours_holiday', 'Hours Holiday Per Year') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('notice_period_days', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('notice_period_days', 'Notice Period (Days)') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('bank_holidays_off', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('bank_holidays_off', 'Is the employee required to take bank holidays off?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('will_work_nights', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('will_work_nights', 'Will the job involve working nights?') }}</div>
   	</div>

   	<h2>Pension and Overtime</h2>
   	<div class="alert alert-info">Floopy doopy do</div>

	<div class="row">
		<div class="col-2">{{ Form::text('overtime_multiplier', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('overtime_multiplier', 'What is the multiplier for overtime?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('pension_match_up_to_percent', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('pension_match_up_to_percent', 'What percentage will pension match to?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('pension_multipler', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('pension_multipler', 'What multiple of pension contributions will be matched?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('pension_match_delay_months', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('pension_match_delay_months', 'Delay in month before pensions start matching') }}</div>
   	</div>

   	<h2>Sick Pay</h2>
   	<div class="alert alert-info">Floopy doopy doo again</div>

	<div class="row">
		<div class="col-6">From Months</div>
		<div class="col-6">Weeks Sick Pay</div>
	</div>
	<div class="row">
		<div class="col-6">{{ Form::text('from_months[]', null, ['class' => 'form-control']) }}</div>
		<div class="col-6">{{ Form::text('weeks_sick_pay[]', null, ['class' => 'form-control']) }}</div>
	</div>
	<div class="row">
		<div class="col-6">{{ Form::text('from_months[]', null, ['class' => 'form-control']) }}</div>
		<div class="col-6">{{ Form::text('weeks_sick_pay[]', null, ['class' => 'form-control']) }}</div>
	</div>
	<div class="row">
		<div class="col-6">{{ Form::text('from_months[]', null, ['class' => 'form-control']) }}</div>
		<div class="col-6">{{ Form::text('weeks_sick_pay[]', null, ['class' => 'form-control']) }}</div>
	</div>
	<div class="row">
		<div class="col-6">{{ Form::text('from_months[]', null, ['class' => 'form-control']) }}</div>
		<div class="col-6">{{ Form::text('weeks_sick_pay[]', null, ['class' => 'form-control']) }}</div>
	</div>
	<div class="row">
		<div class="col-6">{{ Form::text('from_months[]', null, ['class' => 'form-control']) }}</div>
		<div class="col-6">{{ Form::text('weeks_sick_pay[]', null, ['class' => 'form-control']) }}</div>
	</div>
	<div class="row">
		<div class="col-6">{{ Form::text('from_months[]', null, ['class' => 'form-control']) }}</div>
		<div class="col-6">{{ Form::text('weeks_sick_pay[]', null, ['class' => 'form-control']) }}</div>
	</div>

	<div class="row">
		<div class="col-12"><input type="submit" value="Add/Edit Contract" class="form-control btn btn-success" /></div>
	</div>

{!! Form::close() !!}

@endsection
