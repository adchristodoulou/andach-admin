@extends('template')

@section('content')
	<h1>All Positions</h1>
	@foreach ($positions as $position)
	{{$position}}
	@endforeach

	<h2>Modify Positions</h2>
	{!! Form::open(['route' => 'position.store']) !!}
	<div class="row">
		<div class="col-2">{{ Form::label('company_id', 'Company:') }}</div>
		<div class="col-10">{{ Form::select('company_id', $companies, null, ['class' => 'form-control', 'placeholder' => '-- please select company--']) }}</div>

		<div class="col-2">{{ Form::label('reporting_unit_id', 'Reporting Unit:') }}</div>
		<div class="col-10" id="reportingUnitDiv">-- please select company first --</div>

		<div class="col-2">{{ Form::label('job_id', 'Job:') }}</div>
		<div class="col-10" id="jobDiv">-- please select company first --</div>

		<div class="col-2">{{ Form::label('from_date', 'From (Date):') }}</div>
		<div class="col-10" id="jobDiv">{{ Form::date('from_date', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('to_date', 'To (Date):') }}</div>
		<div class="col-10" id="jobDiv">{{ Form::date('to_date', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('weekly_hours_authorised', 'Weekly Hours Authorised:') }}</div>
		<div class="col-10" id="jobDiv">{{ Form::text('weekly_hours_authorised', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::checkbox('can_hire', 1, null, ['class' => 'form-control']) }}</div>
		<div class="col-10">Permission to Hire?</div>

		<div class="col-2">{{ Form::checkbox('can_manage_grievance', 1, null, ['class' => 'form-control']) }}</div>
		<div class="col-10">Permission to Manage Grievance?</div>

		<div class="col-2">{{ Form::checkbox('can_manage_disciplinary', 1, null, ['class' => 'form-control']) }}</div>
		<div class="col-10">Permission to Manage Disciplinaries?</div>

		<div class="col-2">{{ Form::checkbox('can_manage_timesheets', 1, null, ['class' => 'form-control']) }}</div>
		<div class="col-10">Permission to Manage Timesheets?</div>

		<div class="col-2">{{ Form::checkbox('can_manage_holiday', 1, null, ['class' => 'form-control']) }}</div>
		<div class="col-10">Permission to Manage Holiday?</div>

		<div class="col-12">{{ Form::submit('Add Position', ['class' => 'form-control btn btn-success']) }}</div>
	</div>

@endsection

@section('javascript')
<script>
	$("#company_id").on('change', function (e) {
	    var id = this.value;

	    $.ajax({
	        url : '/ajax/reportingunitselect/'+id,
	        type: 'GET',

	        success: function(data){
	            $('#reportingUnitDiv').html(data);
	        }
	    });

	    $.ajax({
	        url : '/ajax/jobselect/'+id,
	        type: 'GET',

	        success: function(data){
	            $('#jobDiv').html(data);
	        }
	    });
	});
</script>
@endsection