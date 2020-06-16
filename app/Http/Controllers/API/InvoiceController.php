<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function __construct()
{
    $this->middleware('auth:api');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $invoice = Invoice::with('InvoiceProduct')->get();
            return $invoice;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'customerPhone' => 'required',
            'customerEmail' => 'required',
            'shipTo' => 'required',
            'quotationDate' => 'required',
            // 'quotationNumber' => 'required',
            'paymentMethod' => 'required',
            'shippingCost' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'priceInWord' => 'required',
            // 'authorisedBy' => 'required',
            'delivaryDate' => 'required',
            'currency' => 'required'
        ]);

        $invoice = new Invoice();
        $invoice->customer = $request->customer;
        $invoice->shipTo = $request->shipTo;
        $invoice->quotationDate = $request->quotationDate;
        $invoice->quotationNumber = $this->invoiceNumber();
        // $invoice->quotationNumber = 'INV4387956';
        $invoice->paymentMethod = $request->paymentMethod;
        $invoice->shippingCost = $request->shippingCost;
        $invoice->subtotal = $request->subtotal;
        $invoice->total = $request->total;
        $invoice->priceInWord = $request->priceInWord;
        $invoice->authorisedBy = Auth::user()->name;
        $invoice->delivaryDate = $request->delivaryDate;
        $invoice->currency = $request->currency;

        $invoice->save();

    }

    function invoiceNumber()
    {
        $latest = Invoice::latest()->first();

        if (! $latest) {
            return 'INV0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->quotationNumber);

        return 'INV' . sprintf('%04d', $string+1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::where('id', $id)->with('InvoiceProduct')->first();
        return $invoice;
        // return response()->json($invoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invo = Invoice::findOrFail($id);
        $invo->delete();
    }
}
