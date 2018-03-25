@extends('template')

@section('content')
{{ $form->display() }}
<hr />
{!! $form->display() !!}
@endsection