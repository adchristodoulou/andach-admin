@extends('template')

@section('content')
	<h1>Edit the Product - {{ $product->name }}</h1>
	{!! Form::model($product, ['route' => 'product.update']) !!}
  {{ Form::hidden('id', $product->id) }}
  {{ Form::hidden('action', 'editproduct') }}

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
 	</div>

 	<h2>Set Product Prices</h2>
 	<div class="row">
 		<div class="col-1">Delete?</div>
 		<div class="col-4">
 			{!! $product->edit_attribute_header !!}
 		</div>
    <div class="col-2">Name</div>
    <div class="col-2">Supplier Code</div>
 		<div class="col-1">Purchase Price</div>
 		<div class="col-1">Sales Price</div>
 		<div class="col-1">Quantity in Stock</div>
  </div>

  @foreach ($product->variations as $variation)
    <div class="row">
      <div class="col-1">{{ Form::checkbox('delete[]', $variation->id, null, ['class' => 'form-control']) }}</div>
      <div class="col-4">
        {!! $variation->edit_attribute_row !!}
      </div>
      <div class="col-2">{{ Form::text('name['.$variation->id.']', $variation->name, ['class' => 'form-control']) }}</div>
      <div class="col-2">{{ Form::text('supplier_code['.$variation->id.']', $variation->supplier_code, ['class' => 'form-control']) }}</div>
      <div class="col-1">{{ Form::text('purchase_price['.$variation->id.']', $variation->purchase_price, ['class' => 'form-control']) }}</div>
      <div class="col-1">{{ Form::text('sale_price['.$variation->id.']', $variation->sale_price, ['class' => 'form-control']) }}</div>
      <div class="col-1">?</div>
    </div>
  @endforeach

  <div class="col-12">{{ Form::submit('Edit This Product', ['class' => 'form-control btn btn-success']) }}</div>

  {{ Form::close() }}

  {!! Form::open(['route' => 'product.update']) !!}
  {{ Form::hidden('id', $product->id) }}
  {{ Form::hidden('action', 'addvariation') }}

  <h2>Add Product/Variation</h2>
  <div class="row">
    {!! $product->add_variation_fields !!}

    <div class="col-2">{{ Form::label('name', 'Name') }}</div>
    <div class="col-10">{{ Form::text('name', null, ['class' => 'form-control']) }}</div>

    <div class="col-2">{{ Form::label('supplier_code', 'Supplier Code') }}</div>
    <div class="col-10">{{ Form::text('supplier_code', null, ['class' => 'form-control']) }}</div>

    <div class="col-2">{{ Form::label('purchase_price', 'Purchase Price') }}</div>
    <div class="col-10">{{ Form::text('purchase_price', null, ['class' => 'form-control']) }}</div>

    <div class="col-2">{{ Form::label('sale_price', 'Supplier Code') }}</div>
    <div class="col-10">{{ Form::text('sale_price', null, ['class' => 'form-control']) }}</div>

    <div class="col-12">{{ Form::submit('Add Variation', ['class' => 'form-control btn btn-success']) }}</div>
  </div>

 	{!! Form::close() !!}

@endsection