@extends('template')

@section('content')
	<h1>Edit Purchase Invoices #{{ $invoice->id }}</h1>
	{!! Form::model($invoice, ['route' => 'purchaseinvoice.update', 'method' => 'post']) !!}
    {{ Form::hidden('action', 'edit') }}
    {{ Form::hidden('id', $invoice->id) }}
    
    <div class="row">
		{!! $ledgers !!}

		<div class="col-2">{{ Form::label('cost_code_id', 'Cost Code') }}</div>
        <div class="col-10" id="costCodeDiv">{{ $costcodes }}</div>

		<div class="col-2">{{ Form::label('document_date', 'Document Date') }}</div>
        <div class="col-10">{{ Form::date('document_date', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('name', 'Invoice Number') }}</div>
        <div class="col-10">{{ Form::text('name', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('description', 'Description / Notes') }}</div>
        <div class="col-10">{{ Form::text('description', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('person_id', 'Supplier') }}</div>
        <div class="col-10">{{ Form::select('person_id', $people, null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('filename', 'Upload PDF/File') }}</div>
        <div class="col-10">{{ Form::file('filename') }}</div>
        
        <div class="col-12">{{ Form::submit('Edit Invoice Details', ['class' => 'form-control btn btn-success']) }}</div>
    </div>
   	{!! Form::close() !!}
    
    <h2>Invoice Lines</h2>
	{!! Form::open(['route' => 'purchaseinvoice.update', 'method' => 'post']) !!}
    {{ Form::hidden('action', 'deletelines') }}
    {{ Form::hidden('id', $invoice->id) }}
    <div class="row">
        <div class="col-1">Delete?</div>
        <div class="col-2">Description</div>
        <div class="col-3">Product</div>
        <div class="col-2">Net</div>
        <div class="col-2">VAT</div>
        <div class="col-2">Gross</div>            
        
        @foreach ($invoice->lines as $line)
            {!! $line->editBox !!}
        @endforeach
        
        <div class="col-6">Total:</div>
        <div class="col-2">{{ $invoice->net }}</div>
        <div class="col-2">{{ $invoice->vat }}</div>
        <div class="col-2">{{ $invoice->gross }}</div> 
        
        <div class="col-2">{{ Form::submit('Delete Lines', ['class' => 'form-control btn btn-danger']) }}</div>
        <div class="col-10">&nbsp;</div>
        
   	{!! Form::close() !!}
    </div>
    
    <h2>Add Invoice Line</h2>
	{!! Form::open(['route' => 'purchaseinvoice.update', 'method' => 'post']) !!}
    {{ Form::hidden('action', 'addline') }}
    {{ Form::hidden('id', $invoice->id) }}
    <div class="row">
        
		<div class="col-2">{{ Form::label('description', 'Line Description') }}</div>
        <div class="col-10">{{ Form::text('description', null, ['class' => 'form-control']) }}</div>
        
		<div class="col-2">{{ Form::label('product_variation_id', 'Product') }}</div>
        <div class="col-10">{{ Form::select('product_variation_id', $variations, null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('net', 'Net') }}</div>
        <div class="col-10">{{ Form::text('net', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('vat', 'VAT') }}</div>
        <div class="col-10">{{ Form::text('vat', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('gross', 'Gross') }}</div>
        <div class="col-10">{{ Form::text('gross', null, ['class' => 'form-control']) }}</div>
        
        <div class="col-12">{{ Form::submit('Add Invoice Line', ['class' => 'form-control btn btn-success']) }}</div>
        
        
    </div>
   	{!! Form::close() !!}
    
@endsection

@section('javascript')
<script>
	$("#ledger_id").on('change', function (e) {
	    var id = this.value;

	    $.ajax({
	        url : '/ajax/costcodeselect/purchaseledger/'+id,
	        type: 'GET',

	        success: function(data){
	            $('#costCodeDiv').html(data);
	        }
	    });
	});
</script>
@endsection