@extends('template')

@section('content')
<h1>Cost Codes</h1>
<div class="alert alert-info">Cost Codes will be directly edited in the SQL.</div>

@include('costcode.recursive', ['costcodes' => $costcodes, 'level' => 0])

@endsection