@extends('template')

@section('content')
	<h1>All Purchase Invoices</h1>
    
    <div class="row">
        <div class="col-2">Supplier</div>
        <div class="col-1">Net</div>
        <div class="col-1">VAT</div>
        <div class="col-1">Gross</div>
    </div>
    
    @foreach ($invoices as $invoice)
    {!! $invoice->box !!}
    @endforeach
@endsection