<?php

namespace App\Repository\customerRepository;

use App\Model\Customer;

class StoreCustomer
{
    public function createCustomer($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->adderss = $request->adderss;
        $customer->save();
    }
}
