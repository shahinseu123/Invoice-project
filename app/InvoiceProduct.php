<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $fillable = [
        'number', 'productname', 'details', 'price', 'quantity','lineTotal', 'storeDisabledProduct','disableProduct'
    ];




   public function Invoice(){
        // return $this->belongsTo(Invoice::class, 'invoice_id')->orderBy('number', 'ASC');
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
