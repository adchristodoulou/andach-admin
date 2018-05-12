@extends('template')

@section('content')
	<h1>Create Purchase Invoice</h1>
	{!! Form::open(['route' => 'purchaseinvoice.store', 'method' => 'post']) !!}

	<div class="row">
		{!! $ledgers !!}

		<div class="col-2">{{ Form::label('cost_code_id', 'Cost Code') }}</div>
        <div class="col-10" id="costCodeDiv">-- select ledger first --</div>

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
        
    </div>
    
    <div class="alert alert-info">If you want to enter invoice lines separately, leave the below blank. Else enter the net / VAT / gross amount below. </div>
    
    <div class="row">
		<div class="col-2">{{ Form::label('line_description', 'Line Description') }}</div>
        <div class="col-10">{{ Form::text('line_description', null, ['class' => 'form-control']) }}</div>
        
		<div class="col-2">{{ Form::label('line_product_variation_id', 'Product') }}</div>
        <div class="col-10">{{ Form::select('line_product_variation_id', $variations, null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('line_net', 'Net') }}</div>
        <div class="col-10">{{ Form::text('line_net', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('line_vat', 'VAT') }}</div>
        <div class="col-10">{{ Form::text('line_vat', null, ['class' => 'form-control']) }}</div>

		<div class="col-2">{{ Form::label('line_gross', 'Gross') }}</div>
        <div class="col-10">{{ Form::text('line_gross', null, ['class' => 'form-control']) }}</div>
        
        <div class="col-12">{{ Form::submit('Add Purchase Invoice', ['class' => 'form-control btn btn-success']) }}</div>
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