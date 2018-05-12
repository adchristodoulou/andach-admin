@extends('template')

@section('content')
	<h1>Show Purchase Invoices #{{ $invoice->id }}</h1>
    
    <div class="row">
        <div class="col-2">{{ Form::label('cost_code_id', 'Cost Code') }}</div>
        <div class="col-10" id="costCodeDiv">{{ $invoice->costcode->name }}</div>

		<div class="col-2">{{ Form::label('document_date', 'Document Date') }}</div>
        <div class="col-10">{{ $invoice->document_date }}</div>

		<div class="col-2">{{ Form::label('name', 'Invoice Number') }}</div>
        <div class="col-10">{{ $invoice->name }}</div>

		<div class="col-2">{{ Form::label('description', 'Description / Notes') }}</div>
        <div class="col-10">{{ $invoice->description }}</div>

		<div class="col-2">{{ Form::label('person_id', 'Supplier') }}</div>
        <div class="col-10">{{ $invoice->person_name }}</div>

		<div class="col-2">{{ Form::label('filename', 'Upload PDF/File') }}</div>
        <div class="col-10">???</div>
    </div>
        
    <h2>Invoice Lines</h2>
    <div class="row">
        <div class="col-3">Description</div>
        <div class="col-3">Product</div>
        <div class="col-2">Net</div>
        <div class="col-2">VAT</div>
        <div class="col-2">Gross</div>            
        
        @foreach ($invoice->lines as $line)
            {!! $line->showBox !!}
        @endforeach
        
        <div class="col-6">Total:</div>
        <div class="col-2">{{ $invoice->net }}</div>
        <div class="col-2">{{ $invoice->vat }}</div>
        <div class="col-2">{{ $invoice->gross }}</div> 
        
    </div>
@endsection