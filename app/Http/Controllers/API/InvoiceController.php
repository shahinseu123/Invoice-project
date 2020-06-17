<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Invoice;
use App\Repository\Invoice\CreateInvoice;
use App\Repository\Invoice\DeleteInvoice;
use App\Repository\Invoice\ShowInvoice;
use Illuminate\Http\Request;

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
        $invoice = Invoice::with('InvoiceProduct')->get();
        return $invoice;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request, CreateInvoice $createInvoice)
    {
        $createInvoice->create($request, $this->invoiceNumber());
    }

    function invoiceNumber()
    {
        $latest = Invoice::latest()->first();

        if (!$latest) {
            return 'INV0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->quotationNumber);

        return 'INV' . sprintf('%04d', $string + 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ShowInvoice $showInvoice)
    {
        $invoice = $showInvoice->show($id);
        return response()->json($invoice);
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
    public function destroy(DeleteInvoice $deleteInvoice, $id)
    {
        $deleteInvoice->delete($id);
    }
}
