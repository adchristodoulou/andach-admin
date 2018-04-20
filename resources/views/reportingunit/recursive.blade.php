
@foreach ($units as $unit)

	<p>{{ $level }} {{ $unit['name'] }}</p>

	@if (count($unit['child']))
		@include('reportingunit.recursive', ['units' => $unit['child'], 'level' => $level + 1])
	@endif
@endforeach