<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Model\Customer;
use App\Repository\customerRepository\DeleteCustomer;
use App\Repository\customerRepository\ShowCustomer;
use App\Repository\customerRepository\StoreCustomer;
use App\Repository\customerRepository\UpdateCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShowCustomer $customer)
    {
        $customer = $customer->showCustomer();
        return $customer;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request, StoreCustomer $storeCustomer)
    {
        $storeCustomer->createCustomer($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, UpdateCustomer $updateCustomer)
    {
        $updateCustomer->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.s
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteCustomer $customer)
    {
        $customer->delete($id);
    }

    public function single_customer($emp)
    {
        $customer = Customer::where(['name' => $emp])->first();
        return $customer;
    }
}
