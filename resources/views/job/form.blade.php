@extends('template')

@section('content')
	<h1>Create or Edit Job</h1>
	
	@if (isset($job))
		{!! Form::model($job, ['route' => 'job.update']) !!}
		{{ Form::hidden('id', $job->id) }}
	@else
		{!! Form::open(['route' => 'job.store']) !!}
	@endif

	<div class="row">
		<div class="col-2">{{ Form::label('name', 'Name') }}</div>
        <div class="col-10">{{ Form::text('name', null, ['class' => 'form-control']) }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::label('category_id', 'Category') }}</div>
        <div class="col-10">NOT YET IMPLEMENTED</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::label('company_id', 'Company') }}</div>
        <div class="col-10">
        	@if (isset($job))
        		{{ $job->company->name }}
        	@else
        		{{ Form::select('company_id', $companies, null, ['class' => 'form-control', 'placeholder' => '--please select company--']) }}
        	@endif
        </div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::label('grade_id', 'Grade') }}</div>
        <div class="col-10" id="gradeDiv">
			@if (isset($job))
        		{{ $job->company->formGradeSelect($job->grade_id) }}
        	@else
        		-- please select a company first --
        	@endif
        </div>
   	</div>

	<div class="row">
		<div class="col-12">{{ Form::label('job_description_summary', 'Summary Job Description') }}</div>
		<div class="col-12">{{ Form::textarea('job_description_summary', null, ['class' => 'form-control']) }}</div>
   	</div>

	<div class="row">
		<div class="col-12">{{ Form::label('job_description_full', 'Full Job Description') }}</div>
		<div class="col-12">{{ Form::textarea('job_description_full', null, ['class' => 'form-control']) }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::radio('is_salaried', 0, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">Hourly Paid</div>
		<div class="col-2">{{ Form::radio('is_salaried', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">Salaried</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('minimum_number_references_needed', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('minimum_number_references_needed', 'How many references (as a minimum) are needed?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::text('number_of_years_references_must_cover', null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('number_of_years_references_must_cover', 'How many years must references cover?') }}</div>
   	</div>

   	<h2>DBS and Security</h2>
   	<div class="alert alert-info">Floopy doopy do</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('requires_dbs_check_standard', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('requires_dbs_check_standard', 'Does this job require a standard DBS check?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('requires_dbs_check_child_barred', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('requires_dbs_check_child_barred', 'Does this job require a child DBS check?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('requires_dbs_check_adult_barred', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('requires_dbs_check_adult_barred', 'Does this job require a adult DBS check?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('requires_dbs_check_extended', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('requires_dbs_check_extended', 'Does this job require an enhanced DBS check?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('requires_criminal_information', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('requires_criminal_information', 'Does this job require the applicant to disclose criminal information?') }}</div>
   	</div>

	<div class="row">
		<div class="col-2">{{ Form::checkbox('requires_spent_criminal_information', 1, null, ['class' => 'form-control']) }}</div>
        <div class="col-10">{{ Form::label('requires_spent_criminal_information', 'Does this job require the applicant to disclose criminal information including information on spent convictions?') }}</div>
   	</div>

   	<h2>Authorised Salaries</h2>
   	<div class="alert alert-info">This section can be ignored if you would like the authorised salaries to inherit from the grade you select, or if you do not have any need to report on authorised salaries. </div>

   	<div class="row">
   		<div class="col-12" id="salariesDiv">
   			@if (isset($job))
        		{!! $job->company->formAuthSalaries($job) !!}
        	@else
        		-- please select a company first --
        	@endif
        </div>
   	</div>


	<h2>Allowed Contracts</h2>
   	<div class="alert alert-info">x</div>

   	<div class="row">
   		@foreach ($contracts as $contract)
   			@if (isset($job))
	   			<div class="col-2">{{ Form::checkbox('allowedContracts[]', $contract->id, $job->contracts->contains($contract->id), ['class' => 'form-control']) }}</div>
	   		@else 
				<div class="col-2">{{ Form::checkbox('allowedContracts[]', $contract->id, null, ['class' => 'form-control']) }}</div>
	   		@endif
	   		<div class="col-10">{{ $contract->name }}</div>
	   	@endforeach
   	</div>


	<div class="row">
		<div class="col-12"><input type="submit" value="Add/Edit Job" class="form-control btn btn-success" /></div>
	</div>

{!! Form::close() !!}

@endsection

@section('javascript')
<script>
	$("#company_id").on('change', function (e) {
	    var id = this.value;

	    $.ajax({
	        url : '/ajax/authsalariesform/'+id,
	        type: 'GET',

	        success: function(data){
	            $('#salariesDiv').html(data);
	        }
	    });

	    $.ajax({
	        url : '/ajax/gradeselect/'+id,
	        type: 'GET',

	        success: function(data){
	            $('#gradeDiv').html(data);
	        }
	    });
	});
</script>
@endsection