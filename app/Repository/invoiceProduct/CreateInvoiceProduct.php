<?php

namespace App\Repository\InvoiceProduct;

use App\InvoiceProduct;

class CreateInvoiceProduct
{
    public function create($data)
    {
        $product = new InvoiceProduct();
        $product->invoice_id = $data->invoice_id;
        $product->number = $data->number;
        $product->productName = $data->productName;
        $product->details = $data->details;
        $product->quantity = $data->quantity;
        $product->price = $data->price;
        $product->linetotal = $data->linetotal;
        $product->storeDisabledProduct = $data->storeDisabledProduct;
        $product->disableProduct = $data->disableProduct;

        $product->save();
    }
}
