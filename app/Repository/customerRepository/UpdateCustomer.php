<?php

namespace App\Repository\customerRepository;

use App\Model\Customer;

class UpdateCustomer
{
    public function update($data, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($data->all());
    }
}
