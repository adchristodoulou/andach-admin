@extends('template')

@section('content')
<h1>Job Grades</h1>
<div class="alert alert-info">Job Grades will be directly edited in the SQL.</div>

<div class="row">
	<div class="col-3">Name</div>
	<div class="col-9">Company</div>
</div>

@foreach ($grades as $grade)
	<div class="row">
		<div class="col-3">{{ $grade->name }}</div>
		<div class="col-9">{{ $grade->company_name }}</div>
	</div>
@endforeach

@endsection