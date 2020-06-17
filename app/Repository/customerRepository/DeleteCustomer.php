<?php

namespace App\Repository\customerRepository;

use App\Model\Customer;

class DeleteCustomer
{
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
    }
}
