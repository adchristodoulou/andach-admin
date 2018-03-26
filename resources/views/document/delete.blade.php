@extends('template')

@section('content')
	<h1>Delete Document</h1>
	<p>Are you absolutely sure you want to delete this document?</p>
	{!! $form->display() !!}
@endsection
	