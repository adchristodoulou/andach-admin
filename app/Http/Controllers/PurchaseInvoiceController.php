<?php

namespace App\Http\Controllers;

use App\Person;
use App\PurchaseInvoice;
use App\PurchaseLedger;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    public function create()
    {
        $ledgers = PurchaseInvoice::formLedgerSelect(PurchaseLedger::pluck('name', 'id'));
        $people  = Person::pluck('name', 'id');
        
        return view('purchaseinvoice.create', ['ledgers' => $ledgers, 'people' => $people]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'document_date' => 'required',
            'name' => 'required',
        ]);
        
        $invoice = new PurchaseInvoice($request->all());
        $invoice->save();
        
        if ($request->input('description'))
        {
            $invoice->addLine($request->all());
            $invoice->finalise();
        }
    }
}
