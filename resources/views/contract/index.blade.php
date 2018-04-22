@extends('template')

@section('content')
<h1>Contracts</h1>
<div class="alert alert-info">Cost Codes will be directly edited in the SQL.</div>

<div class="row">
	<div class="col-4">Name</div>
	<div class="col-2">FTE Hours</div>
	<div class="col-2">Hours Holiday</div>
	<div class="col-2">Work Nights?</div>
	<div class="col-2">Notice Period</div>
</div>

@foreach ($contracts as $contract)
	<div class="row">
		<div class="col-4"><a href="{{ route('contract.edit', $contract->id) }}">{{ $contract->name }}</a></div>
		<div class="col-2">{{ $contract->fte_hours_per_week }}</div>
		<div class="col-2">{{ $contract->annual_hours_holiday }}</div>
		<div class="col-2">{{ $contract->will_work_nights }}</div>
		<div class="col-2">{{ $contract->notice_period_days }}</div>
	</div>
@endforeach

@endsection