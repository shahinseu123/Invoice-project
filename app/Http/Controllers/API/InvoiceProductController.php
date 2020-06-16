<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceProduct;
use Illuminate\Http\Request;


class InvoiceProductController extends Controller
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
        $invoice = Invoice::orderBy('created_at', 'desc')->first();
        return $invoice;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
             $product = new InvoiceProduct();
             $product->invoice_id = $request->invoice_id;
             $product->number = $request->number;
             $product->productName = $request->productName;
             $product->details = $request->details;
             $product->quantity = $request->quantity;
             $product->price = $request->price;
             $product->linetotal = $request->linetotal;
             $product->storeDisabledProduct = $request->storeDisabledProduct;
             $product->disableProduct = $request->disableProduct;

             $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
