<?php

namespace App\Repository\Invoice;

use App\Invoice;
use Illuminate\Support\Facades\Auth;

class CreateInvoice
{
    public function create($data, $number)
    {
        $invoice = new Invoice();
        $invoice->customer = $data->customer;
        $invoice->shipTo = $data->shipTo;
        $invoice->quotationDate = $data->quotationDate;
        $invoice->quotationNumber = $number;
        // $invoice->quotationNumber = 'INV4387956';
        $invoice->paymentMethod = $data->paymentMethod;
        $invoice->shippingCost = $data->shippingCost;
        $invoice->subtotal = $data->subtotal;
        $invoice->total = $data->total;
        $invoice->priceInWord = $data->priceInWord;
        $invoice->authorisedBy = Auth::user()->name;
        $invoice->delivaryDate = $data->delivaryDate;
        $invoice->currency = $data->currency;

        $invoice->save();
    }
}
