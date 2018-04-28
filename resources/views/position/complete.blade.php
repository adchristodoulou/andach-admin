@extends('template')

@section('content')
	<h1>All Positions</h1>
	<div class="row">
		<div class="col-2">Company</div>
		<div class="col-2">Reporting Unit</div>
		<div class="col-2">Area</div>
		<div class="col-3">Job</div>
		<div class="col-3">Weekly Hours</div>
	</div>
	@foreach ($positions as $position)
		<div class="row">
			<div class="col-2">{{ $position->company_name }}</div>
			<div class="col-2">{{ $position->reporting_unit_name }}</div>
			<div class="col-2">{{ $position->reporting_unit_area_name }}</div>
			<div class="col-3">{{ $position->job_name }}</div>
			<div class="col-3">{{ $position->weekly_hours_authorised }}</div>
		</div>
	@endforeach

@endsection