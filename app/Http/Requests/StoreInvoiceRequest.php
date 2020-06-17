<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
        ];
    }
}
