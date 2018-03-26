@extends('template')

@section('content')
	<h1>Edit Document</h1>
	{!! $document->box !!}
	<h2>Full Revision History</h2>
	@foreach ($history as $doc)
		{!! $doc-> box !!}
	@endforeach
	<h2>Edit Form</h2>
	{!! $form->display() !!}
@endsection
