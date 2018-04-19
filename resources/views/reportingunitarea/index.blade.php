@extends('template')

@section('content')
<h1>Reporting Unit Areas</h1>
<div class="alert alert-info">Reporting Unit Areas will be directly edited in the SQL.</div>

<div class="row">
	<div class="col-3">Name</div>
	<div class="col-9">Company</div>
</div>

@foreach ($areas as $area)
	<div class="row">
		<div class="col-3">{{ $area->name }}</div>
		<div class="col-9">{{ $area->company_name }}</div>
	</div>
@endforeach

@endsection