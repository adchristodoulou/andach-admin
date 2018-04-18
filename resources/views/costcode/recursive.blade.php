
@foreach ($costcodes as $cc)

	<p>{{ $level }} {{ $cc['name'] }}</p>

	@if (count($cc['child']))
		@include('costcode.recursive', ['costcodes' => $cc['child'], 'level' => $level + 1])
	@endif
@endforeach