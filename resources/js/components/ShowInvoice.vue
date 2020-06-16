<template>
    <div class="container">
        <div class="card-header my-4">
            <h3>Invoice</h3>
            <div class="card-tools">
                <router-link to="/invoice" class="btn btn-info">BACK</router-link>
                <button @click="printInvoice" class="btn btn-secondaru">PRINT</button>
                <!-- <a @click="printInvoice" class="btn btn-secondaru">PRINT</a> -->
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
                    <i>{{invoice.customer}}</i><br>
                    <i>{{invoice.customerPhone}}</i><br>
                    <i>{{invoice.customerEmail}}</i>
                    <!-- <i>Please fill in</i> -->
                </div>
                <div class="col-md-4">
                    <img width="45%" src="/img/iso_img.PNG" alt="logo"><br>
                    <p class="mt-4" style="font-weight:bold;background-color:#2A2F5F;font-size:10px;color:grey;width:70%;margin:0">Ship To</p>
                    <i>{{invoice.shipTo}}</i>
                </div>
                <div class="col-md-4">
                     <img style="margin-top:50px" width="40%" src="/img/quatition.PNG" alt="logo"><br>
                     <small style="font-weight:bold">DATE:</small><span style="font-size:10px;background-color:#D3E6EC;padding:1px 24px">{{ today }}</span><br>
                     <small style="font-weight:bold">Delivery date:</small><span style="font-size:10px;background-color:#D3E6EC;padding:1px 24px">{{invoice.delivaryDate}}</span><br>
                     <small style="font-weight:bold">Quotation:</small><span style="font-size:10px;border:none;padding:1px;background-color:#D3E6EC;">{{invoice.quotationNumber}}</span>
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
                    <tr v-for="product in invoice.invoice_product" :key="product.id">
                        <td >{{product.number}}</td>
                        <td style="width:30%"><small style="padding:5px"> <b>{{product.productName}}</b><br>{{product.details}} </small>
                        </td>
                        <!-- <td ><small style="padding:5px">2-3-4040</small></td> -->
                        <td v-show="product.disableProduct" ><small style="padding:5px">{{product.storeDisabledProduct}}</small></td>
                        <td v-show="!product.disableProduct" ><small style="padding:5px">{{product.quantity}}</small></td>
                        <td ><small style="padding:5px">{{product.price}}</small></td>
                        <td ><small style="padding:5px;width:25%">{{product.lineTotal == '0' ? "--" : product.lineTotal}}</small></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="row" style="margin-top:-30px;padding-bottom:50px;">
                <div class="col-md-6">
                    <div style="border:1px solid black;margin-left:50px;margin-bottom:50px; ">
                        <p class="p-4">Payment: {{invoice.paymentMethod}}</p>
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
                            <li><span>{{moneySign}}</span>{{invoice.shippingCost}}</li>
                            <li><span>{{moneySign}}</span>{{invoice.subtotal}}</li>
                            <li><span>{{moneySign}}</span>{{invoice.total}}</li>
                        </ul>
                    </div>
                    <small style="font-weight:700">In word:</small><div class="big-sp"><p>{{invoice.priceInWord|uptext}} {{invoice.currency|changeCurrency}}</p></div>
                    <p class="mt-3 ml-3">{{invoice.authorisedBy}}</p>
                    <span class="line"></span>
                    <div style="display: flex;justify-content:space-between;margin-top:-10px">
                        <p class="ml-3">Sales Authorised by</p>
                        <p style="margin-right:50px">{{invoice.created_at|momentTime}}</p>
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
</template>

<script>
    export default {
        data(){
            return {
                moneySign: '',
                invoice_id: this.$route.params.id,
                invoice: {}
            }
        },
        computed: {
            today(){
                let date = new Date()
                return  date.getFullYear()+"-"+"0"+date.getMonth()+"-"+"0"+date.getDay()
            }
        },
        methods: {
            loadSingleInvoice(){
                axios.get(`/api/invoice/${this.invoice_id}`)
                     .then(({data}) => {
                         this.invoice = data
                     })
                     .catch(( err ) => console.log(err))
            },
            printInvoice(){ 
                // var print_area =  $('.invoiceWindow').html();         
                // this.PrintElem('myDiv');
                window.print()
                // Bus.$emit('getinvoid', this.invoice_id)
                // console.log(this.invoice_id)
                // var html_view = $(".pdf-cont").html();
                // $.post('/report/print.php',{report_print:html_view},function(data){
                //     alert(data);
                // });
                // this.$htmlToPaper('myDiv');
            },
            // printInvoice()
            // {
            //     axios.get(`/printInvoice/${this.invoice_id}`)
            //          .then(() => {

            //          })
            //          .catch((err => console.log(err)))
            // },

            // PrintElem(elem)
            //     {
            //         var mywindow = window.open('', 'PRINT', 'height=100%,width=100%');

            //         // mywindow.document.write('<html><head><title>' + document.title  + '</title>');
            //         // mywindow.document.write('</head><body >');
            //         // mywindow.document.write('<h1>' + document.title  + '</h1>');
            //         mywindow.document.write(document.getElementById(elem).innerHTML);
            //         // mywindow.document.write('</body></html>');

            //         mywindow.document.close(); // necessary for IE >= 10
            //         mywindow.focus(); // necessary for IE >= 10*/

            //         mywindow.print();
            //         mywindow.close();

            //         return true;
            //     },

            changeCurrencySimble(){
                if(this.invoice.currency == "USD"){
                     this.moneySign = "$ "
                }else if(this.invoice.currency == "EURO"){
                     this.moneySign = "€ "
                }else if(this.invoice.currency == "POUND"){
                     this.moneySign = "£ "
                }else if(this.invoice.currency == "AUD"){
                     this.moneySign = "A$ "
                }else{
                    this.moneySign = "৳ "
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.loadSingleInvoice()
            setTimeout(() => {
                this.changeCurrencySimble()
            },1000)
        }
    }
</script>
<style scoped>
   *{
       background-color: white;
   }
   .col-up{
      position: relative;
   }
   .sp-up{
      position: absolute;
      top: 0;
      left: 0;
      width: 13px;
      background-color: #EC008C;
      height: 150%;
   }
   .col-down{
      position: relative;
   }
   .sp-down{
      position: absolute;
      top: 0;
      left: 33px;
      width: 13px;
      background-color: #E6E6E6;
      height: 90%;
   }
   table{
       width: 100%;
       border-collapse: collapse;
   }
   th{
       background-color: #3A4E86;
       color: grey;
       text-align: center;
   }
   td{
       text-align: center;
       height: 100px;
   }
   table, th, td {
       border: 1px solid black;
   }
   .ul-left{
       padding: 0;
       margin: 0;
       text-align:left;
       list-style-type:none;
       
   }
   .ul-left li{
       border: 1px solid black;
       border-left: none;
       padding: 2px 19px;
       
   }
   .make-flex{
       display: flex;

   }
   .big-sp{
       width: 80%;
       height: auto;
       border: 2px solid black;
       display: inline-block;
       padding: 10px 10px;
   }
   .rel{
      position: relative;
   }
   .line{
      position: absolute;
      left: 30px;
      bottom: 41px;
      width: 80%;
      height: 2px;
      background-color: black;
   }
   .center-div{
       width: 400px;
       text-align: center;
       margin: 0 auto;
   }

   @media print {
    .invoiceWindow {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
        color-adjust: exact; 
        -webkit-print-color-adjust: exact;
        /* print-color-adjust: exact; */
        -webkit-print-color-adjust: exact;
    }
    /* .invoiceWindow .header{
        position: sticky;
    } */
    
}
   
</style>