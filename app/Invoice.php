<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable =[
        'customer','customerEmail','customerPhone', 'shipTo', 'quotationDate', 'quotationNumber', 'paymentMethod', 
        'shippingCost', 'subtotal', 'total', 'priceInWord', 'authorisedBy', 'delivaryDate','currency'
    ];
    
    public function InvoiceProduct(){
        return $this->hasMany(InvoiceProduct::class, 'invoice_id')->orderBy('id');
    }
}

// public function InvoiceProduct(){
//         return $this->hasMany(InvoiceProduct::class, 'invoice_id')->orderBy('number');
//     }