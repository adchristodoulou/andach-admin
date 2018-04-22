@extends('template')

@section('content')
<h1>Contracts</h1>
<div class="alert alert-info">Jobs jobs jobs</div>

<div class="row">
	<div class="col-4">Name</div>
</div>

@foreach ($jobs as $job)
	<div class="row">
		<div class="col-12"><a href="{{ route('job.edit', $job->id) }}">{{ $job->name }}</a></div>
	</div>
@endforeach

@endsection