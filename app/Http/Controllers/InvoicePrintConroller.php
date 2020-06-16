<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoicePrintConroller extends Controller
{
    public function show($id){
        dd($id);
        $invoice = Invoice::findOrFail($id);
        // return $invoice;
        // return view('showInvoice')->with('invoice', $invoice);
        // return view('showInvoice');
        return $invoice;
    }
}
