<?php

namespace App\Repository\Invoice;

use App\Invoice;

class ShowInvoice
{
    public function show($id)
    {
        $invoice = Invoice::where('id', $id)->with('InvoiceProduct')->first();
        return $invoice;
    }
}
