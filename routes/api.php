<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Client ID: 1
// client secret: Client secret: MjfiHAFLEQqduSrVhGl3XLL5ToRUql4PZ6zyTDo9
// Client ID: 2
// Client secret: au2CkRdk25Kue0Wm6w4C2qaV26Rp506LrD82do9k

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['invoice' => 'API\InvoiceController']);
Route::apiResources(['invoice-product' => 'API\InvoiceProductController']);
Route::apiResources(['customer' => 'API\CustomerController']);
Route::get('single-customer/{emp}', 'API\CustomerController@single_customer');
Route::get('/printinvoice/{id}', 'InvoicePrintConroller@show')         ->name('printinvoice');
// Route::get('/printinvoice/{id}', 'InvoicePrintConroller@show');