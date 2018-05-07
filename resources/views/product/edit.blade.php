@extends('template')

@section('content')
	<h1>Edit the Product - {{ $product->name }}</h1>
	{!! Form::model($product, ['route' => 'product.update']) !!}
	{{ Form::hidden('id', $product->id) }}

	<div class="row">
		<div class="col-2">{{ Form::label('name', 'Name') }}</div>
        <div class="col-10">{{ Form::text('name', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('category_id', 'Category') }}</div>
        <div class="col-10">NOT YET IMPLEMENTED</div>
    </div>

	<h2>Allowed Attributes</h2>
	<div class="row">
		@foreach ($product->attributes as $attribute)
			<div class="col-2">{{ Form::checkbox('attributes[$attribute->id]', $attribute->id, 1, ['class' => 'form-control', 'disabled' => 'disabled']) }}</div>
			<div class="col-10">{{ Form::label('attributes[$attribute->id]', $attribute->name) }}</div>
		@endforeach

		<div class="col-12">{{ Form::submit('Edit this Product', ['class' => 'form-control btn btn-success']) }}</div>
   	</div>

   	<h2>Set Product Prices</h2>
   	<div class="row">
   		<div class="col-1">Delete?</div>
   		<div class="col-4">
   			{!! $product->edit_attribute_header !!}
   		</div>
   		<div class="col-2">Supplier Code</div>
   		<div class="col-2">Purchase Price</div>
   		<div class="col-2">Sales Price</div>
   		<div class="col-1">Quantity in Stock</div>
   	</div>

   	{!! Form::close() !!}

@endsection