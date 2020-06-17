<?php

namespace App\Repository\Invoice;

use App\Invoice;

class DeleteInvoice
{
    public function delete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
    }
}
