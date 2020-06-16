<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Invoice</title>
</head>
<body>
    <div class="container">
        <div class="card-header my-4">
            <h3>Invoice</h3>
            <div class="card-tools">
                {{-- <router-link to="/invoice" class="btn btn-info">BACK</router-link> --}}
                <button  class="btn btn-secondaru">PRINT</button>
            </div>
        </div>
        <!-- ------------------------------------------------------------------- -->
        <div class="mt-4 invoiceWindow" id="myDiv">
            <div class="row p-5 header" >
                <div class="col-md-4 col-up">
                    <span class="sp-up"></span>
                    <img width="80%" src="/img/transcrop.PNG" alt="logo"><br>
                    <small>House 68, Road 20 </small>
                    <small>Sector 11, Uttara, Dhaka 1230 </small><br>
                    <small>Bangladesh </small><br>
                    <small>Email: lifesciences@transcorp.com.bd  </small><br>
                    <p class="mt-4" style="font-weight:bold;background-color:#2A2F5F;font-size:10px;color:#D3E6EC;width:70%;margin:0;">CUSTOMER</p>
                     <i>{{$invoice->customer}}</i><br>
                    <i>{{$invoice->customerPhone}}</i><br>
                    <i>{{$invoice->customerEmail}}</i> 
                    <!-- <i>Please fill in</i> -->
                </div>
                <div class="col-md-4">
                    <img width="45%" src="/img/iso_img.PNG" alt="logo"><br>
                    <p class="mt-4" style="font-weight:bold;background-color:#2A2F5F;font-size:10px;color:grey;width:70%;margin:0">Ship To</p>
                    <i>{{$invoice->shipTo}}</i>
                </div>
                <div class="col-md-4">
                     <img style="margin-top:50px" width="40%" src="/img/quatition.PNG" alt="logo"><br>
                     <small style="font-weight:bold">DATE:</small><span style="font-size:10px;background-color:#D3E6EC;padding:1px 24px">{{ /Carbon::today() }}</span><br>
                     <small style="font-weight:bold">Delivery date:</small><span style="font-size:10px;background-color:#D3E6EC;padding:1px 24px">{{$invoice->delivaryDate}}</span><br>
                     <small style="font-weight:bold">Quotation:</small><span style="font-size:10px;border:none;padding:1px;background-color:#D3E6EC;">{{$invoice->quotationNumber}}</span>
                </div>
            </div>
            <div class="p-5 col-down">
                <span class="sp-down"></span>
                <table>
                <thead>
                    <tr>
                        <th >ITEM#</th>
                        <th style="width:38%">DESCRIPTION</th>
                        <th >REQ. UNIT</th>
                        <th >UNIT PRICE</th>
                        <th style="width:25%">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($invoice-> as $item)
                       
                   <tr>
                       <td >{{$product.number}}</td>
                       <td style="width:30%"><small style="padding:5px"> <b>{{$product.productName}}</b><br>{{product.details}} </small>
                       </td>
                       <!-- <td ><small style="padding:5px">2-3-4040</small></td> -->
                       <td v-show="product.disableProduct" ><small style="padding:5px">{{product.storeDisabledProduct}}</small></td>
                       <td v-show="!product.disableProduct" ><small style="padding:5px">{{product.quantity}}</small></td>
                       <td ><small style="padding:5px">{{product.price}}</small></td> --}}
                       <td ><small style="padding:5px;width:25%">{{product.lineTotal == '0' ? "--" : product.lineTotal}}</small></td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            </div>
            <div class="row" style="margin-top:-30px;padding-bottom:50px;">
                <div class="col-md-6">
                    <div style="border:1px solid black;margin-left:50px;margin-bottom:50px; ">
                        {{-- <p class="p-4">Payment: {{invoice.paymentMethod}}</p> --}}
                    </div>
                </div>
                <div class="col-md-6 rel">
                    <div class="make-flex">
                        <ul class="ul-left" style="margin-left:15%;width:130px">
                            <li>Shipping</li>
                            <li>Sub-total</li>
                            <li>Total</li>
                        </ul>
                        <ul class="ul-left" style="width:208px">
                            {{-- <li><span>{{moneySign}}</span>{{invoice.shippingCost}}</li>
                            <li><span>{{moneySign}}</span>{{invoice.subtotal}}</li>
                            <li><span>{{moneySign}}</span>{{invoice.total}}</li> --}}
                        </ul>
                    </div>
                    {{-- <small style="font-weight:700">In word:</small><div class="big-sp"><p>{{invoice.priceInWord|uptext}} {{invoice.currency|changeCurrency}}</p></div> --}}
                    {{-- <p class="mt-3 ml-3">{{invoice.authorisedBy}}</p> --}}
                    <span class="line"></span>
                    <div style="display: flex;justify-content:space-between;margin-top:-10px">
                        <p class="ml-3">Sales Authorised by</p>
                        {{-- <p style="margin-right:50px">{{invoice.created_at|momentTime}}</p> --}}
                    </div>
                </div>
            </div>
            <div class="center-div pb-5">
                <h6 style="font-weight:700">Thank you for your business </h6>
                <small>If you have any question about this Invoice, please contact </small>
                <small>lifesciences@transcorp.com.bd, call: +880 1841 361 915 </small>
            </div>
                <p class="text-center pb-5">TRANSCORP INFORMATIX LTD IS AN ISO 9001:2015 CERTIFIED QUALITY MANAGED COMPANY</p>

        </div>
        <!-- ----------------------------------------------------------------------------- -->
    </div>
</body>
</html>