<?php

namespace App\Http\Controllers;

use App\Company;
use App\Person;
use App\ProductVariation;
use App\PurchaseInvoice;
use App\PurchaseInvoiceLine;
use App\PurchaseLedger;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    public function create()
    {
        $ledgers = PurchaseInvoice::formLedgerSelect(PurchaseLedger::pluck('name', 'id'));
        $people  = Person::pluck('name', 'id');
        $variations = ProductVariation::pluck('name', 'id');
        
        return view('purchaseinvoice.create', ['ledgers' => $ledgers, 'people' => $people, 'variations' => $variations]);
    }
    
    public function edit($id)
    {
        $invoice = PurchaseInvoice::find($id);
        if (!$invoice->canEdit())
        {
            return redirect()->route('purchaseinvoice.show', $invoice->id);
        }
        
        $ledgers = PurchaseInvoice::formLedgerSelect(PurchaseLedger::pluck('name', 'id'), $invoice->ledger_id);
        $people  = Person::pluck('name', 'id');
        $costcodes = Company::find($invoice->ledger->company_id)->formCostCodes($invoice->cost_code_id);
        $variations = ProductVariation::pluck('name', 'id');
        
        return view('purchaseinvoice.edit', ['invoice' => $invoice, 'ledgers' => $ledgers, 'people' => $people, 'costcodes' => $costcodes, 'variations' => $variations]);
    }

    public function index()
    {
        $invoices = PurchaseInvoice::all();
        
        return view('purchaseinvoice.index', ['invoices' => $invoices]);
    }
    
    public function show($id)
    {
        $invoice = PurchaseInvoice::find($id);
        if ($invoice->canEdit())
        {
            return redirect()->route('purchaseinvoice.edit', $invoice->id);
        
        }
        
        return view('purchaseinvoice.show', ['invoice' => $invoice]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'document_date' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $invoice = new PurchaseInvoice($request->all());
        $invoice->save();
        
        if ($request->input('line_description'))
        {
            $lineArray['description'] = $request->input('line_description');
            $lineArray['product_variation_id'] = $request->input('line_product_variation_id');
            $lineArray['net'] = $request->input('line_net');
            $lineArray['vat'] = $request->input('line_vat');
            $lineArray['gross'] = $request->input('line_gross');
            
            $invoice->addLine($lineArray);
            $invoice->finalise();
    
            session()->flash('success', 'The Invoice has been successfully created, now you can add line detail.');
            return redirect()->route('purchaseinvoice.edit', ['id' => $invoice->id]);
        }
    
        session()->flash('success', 'The Invoice has been successfully created.');
        return redirect()->route('purchaseinvoice.index');
    }
    
    public function update(Request $request)
    {
        $invoice = PurchaseInvoice::find($request->input('id'));
        
        switch ($request->input('action'))
        {
            case 'addline' :
                $invoice->addLine($request->all());
                session()->flash('success', 'The Invoice Line has been added');
                return redirect()->route('purchaseinvoice.edit', $invoice->id);
                break;
            
            case 'deletelines' :
                PurchaseInvoiceLine::destroy($request->input('delete'));
                session()->flash('success', 'The Invoice Lines have been deleted');
                return redirect()->route('purchaseinvoice.edit', $invoice->id);
                break;
                
            case 'edit' :
                $invoice->update($request->all());
                session()->flash('success', 'The Invoice has been edited');
                return redirect()->route('purchaseinvoice.edit', $invoice->id);
                break;
            
            case 'finalise' :
                $invoice->finalise();
                session()->flash('success', 'The Invoice has been finalised and can no longer be edited');
                return redirect()->route('purchaseinvoice.index');
                break;
        }
    }
}
