@extends('template')

@section('content')
<h1>Products</h1>
<div class="alert alert-info">Click here to <a href="{{ route('product.create') }}">create a product</a>.</div>

<div class="row">
	<div class="col-3">Name</div>
	<div class="col-9">Company</div>
</div>

@foreach ($products as $product)
	<div class="row">
		<div class="col-3"><a href="{{ route('product.edit', $product->id) }}">{{ $product->name }}</a></div>
		<div class="col-9"></div>
	</div>
@endforeach

@endsection