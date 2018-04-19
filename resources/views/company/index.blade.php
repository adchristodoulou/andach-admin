@extends('template')

@section('content')
<h1>Companies</h1>
<div class="alert alert-info">Companies will be directly edited in the SQL.</div>

<div class="row">
	<div class="col-3">Name</div>
	<div class="col-9">Companies House ID</div>
</div>

@foreach ($companies as $company)
	<div class="row">
		<div class="col-3">{{ $company->name }}</div>
		<div class="col-9">{{ $company->companies_house_id }}</div>
	</div>
@endforeach

@endsection