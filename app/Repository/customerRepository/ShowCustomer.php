<?php

namespace App\Repository\customerRepository;

use App\Model\Customer;

class ShowCustomer
{
    public function showCustomer()
    {
        $customer = Customer::orderBy('created_at', 'desc')->get();
        return $customer;
    }
}
