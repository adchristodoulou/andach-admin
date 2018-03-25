@extends('template')

@section('content')

	@if (count($traitdata['documents']) > 0)
		<h1>Documents and Comments Relating to {{ $traitdata['name'] }}</h1>
		@foreach ($traitdata['documents'] as $doc)
			{{ $doc->box }}
		@endforeach
	@else 
		<h1>There are no Documents or Comments Relating to {{ $traitdata['name'] }}</h1>
	@endif

	<h2>Add Document or Comment</h2>
	{!! $traitdata['form']->display() !!}
@endsection
