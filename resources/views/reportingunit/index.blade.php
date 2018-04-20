@extends('template')

@section('content')
<h1>Reporting Units</h1>
<div class="alert alert-info">Reporting Units will be directly edited in the SQL.</div>

@include('reportingunit.recursive', ['units' => $units, 'level' => 0])

@endsection